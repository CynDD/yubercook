<?php
include_once 'psl-config.php';

function sec_session_start() {
	$session_name = 'sec_session_id'; // Set a custom session name
	$secure = SECURE;
	// This stops JavaScript being able to access the session id.
	$httponly = true;
	// Forces sessions to only use cookies.
	if (ini_set ( 'session.use_only_cookies', 1 ) === FALSE) {
		header ( "Location: ../error.php?err=Could not initiate a safe session (ini_set)" );
		exit ();
	}
	// Gets current cookies params.
	$cookieParams = session_get_cookie_params ();
	session_set_cookie_params ( $cookieParams ["lifetime"], $cookieParams ["path"], $cookieParams ["domain"], $secure, $httponly );
	// Sets the session name to the one set above.
	session_name ( $session_name );
	// session_start(); // Start the PHP session
	if (session_status () == PHP_SESSION_NONE) {
		session_start ();
	}
	session_regenerate_id ( true ); // regenerated the session, delete the old one.
}
function login($email, $password, $mysqli) {
	// Using prepared statements means that SQL injection is not possible.
	if ($stmt = $mysqli->prepare ( "SELECT user_id, fullname, username, password, salt
        FROM reg_users
       WHERE email =?
        LIMIT 1" )) {
		$stmt->bind_param ( 's', $email ); // Bind "$email" to parameter.
		$stmt->execute (); // Execute the prepared query.
		$stmt->store_result ();

		// get variables from result.
		$stmt->bind_result ( $user_id, $fullname, $db_password, $salt );
		$stmt->fetch ();
		$_SESSION ['fullname'] = $fullname;
		$_SESSION ['user_id'] = $user_id;
		$salt = $email;
		// hash the password with the unique salt.
		$password = hash ( 'sha512', $salt . $password );
		if ($stmt->num_rows == 1) {
			// If the user exists we check if the account is locked
			// from too many login attempts

			if (checkbrute ( $user_id, $mysqli ) == true) {
				// Account is locked
				// Send an email to user saying their account is locked
				return false;
			} else {
				// Check if the password in the database matches
				// the password the user submitted.
				if ($db_password == $password) {
					// Password is correct!
					// Get the user-agent string of the user.
					$user_browser = $_SERVER ['HTTP_USER_AGENT'];
					// XSS protection as we might print this value
					$user_id = preg_replace ( "/[^0-9]+/", "", $user_id );
					$_SESSION ['user_id'] = $user_id;

					if ($stmtFullname = $mysqli->prepare ( "SELECT fullname
        			FROM reg_users
       				WHERE email =?
			        LIMIT 1" )) {
						$stmtFullname->bind_param ( 's', $email ); // Bind "$email" to parameter.
						$stmtFullname->execute (); // Execute the prepared query.
						$stmtFullname->store_result ();
						// get variables from result.
						$stmtFullname->bind_result ( $fullname );
						$stmtFullname->fetch ();
						$_SESSION ['fullname'] = $fullname;
					}

					if ($stmtBLOCKED = $mysqli->prepare ( "SELECT blocked
        			FROM login_attempts
       				WHERE user_id =?
	                ORDER BY times DESC
			        LIMIT 1" )) {
						$stmtBLOCKED->bind_param ( 'i', $user_id ); // Bind "$email" to parameter.
						$stmtBLOCKED->execute (); // Execute the prepared query.
						$stmtBLOCKED->store_result ();
						// get variables from result.
						$stmtBLOCKED->bind_result ( $blocked );
						$stmtBLOCKED->fetch ();
						$_SESSION ['blocked'] = $blocked;
					}
					if ($blocked != 1) {
						$_SESSION ['login_string'] = hash ( 'sha512', $password . $user_browser );
						$times = date ( "Y-m-d H:i:s" );
						$sql_login = "INSERT INTO login VALUES (\"$user_id\",\"$times\")";
						$queryLogin = $mysqli->query ( $sql_login );

						if ($stmtFAILED = $mysqli->prepare ( "SELECT failed
	        			FROM login_attempts
	       				WHERE user_id =?
				        LIMIT 1" )) {
							$stmtFAILED->bind_param ( 'i', $user_id ); // Bind "$email" to parameter.
							$stmtFAILED->execute (); // Execute the prepared query.
							$stmtFAILED->store_result ();
							// get variables from result.
							$stmtFAILED->bind_result ( $failed );
							$stmtFAILED->fetch ();
							$_SESSION ['failed'] = $failed;
						}
						if ($failed < 5) {
							$failed2 = '5';
							$sql_login_restore_failed = "INSERT INTO login_attempts VALUES (\"$user_id\",\"$times\",\"$failed2\",\"$blocked\")";
							$queryLogin_restore_failed = $mysqli->query ( $sql_login_restore_failed );
						}

						// Login successful.
						return true;
					} else {
						// Usuario bloqueado.
						return false;
					}
				} else {
					// Password is not correct
					// We record this attempt in the database
					$sql1 = "select user_id from reg_users where (email=\"$_POST[email]\")";
					$query = $mysqli->query ( $sql1 );
					while ( $r = $query->fetch_array () ) {
						$user_id = $r ["user_id"];
						break;
					}
					// SELECT user_id, time, failed, blocked FROM login_attempts WHERE user_id =? LIMIT 1;
					$sql2 = "select times, failed, blocked FROM login_attempts WHERE (user_id=\"$user_id\")
                	ORDER BY times DESC
					LIMIT 1";
					$query1 = $mysqli->query ( $sql2 );
					while ( $s = $query1->fetch_array () ) {
						$time = $s ["times"];
						$failed = $s ["failed"];
						$blocked = $s ["blocked"];

						break;
					}

					$times = date ( "Y-m-d H:i:s" );
					if ($failed > 0)
						$failed = $failed - 1;
						// INSERT INTO `login_attempts`(`user_id`, `time`, `failed`, `blocked`) VALUES ([value-1],[value-2],[value-3],[value-4])
					if ($failed == 0)
						$blocked = '1';
					$sql3 = "INSERT INTO login_attempts VALUES (\"$user_id\",\"$times\",\"$failed\",\"$blocked\")";
					$_SESSION ['failed'] = $failed;
					$_SESSION ['blocked'] = $blocked;
					$query2 = $mysqli->query ( $sql3 );
				}
			}
		} else {
			// No user exists.
			return false;
		}
	}
}
function checkbrute($user_id, $mysqli) {
	// Get timestamp of current time
	$now = time ();
	// All login attempts are counted from the past 2 hours.
	$valid_attempts = $now - (2 * 60 * 60);
	if ($stmt = $mysqli->prepare ( "SELECT time
                            FROM login_attempts
                             WHERE user_id = ?
                            AND time > '$valid_attempts'" )) {
		$stmt->bind_param ( 'i', $user_id );

		// Execute the prepared query.
		$stmt->execute ();
		$stmt->store_result ();

		// If there have been more than 5 failed logins
		if ($stmt->num_rows > 5) {
			return true;
		} else {
			return false;
		}
	}
}
function esc_url($url) {
	if ('' == $url) {
		return $url;
	}

	$url = preg_replace ( '|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url );

	$strip = array (
			'%0d',
			'%0a',
			'%0D',
			'%0A'
	);
	$url = ( string ) $url;

	$count = 1;
	while ( $count ) {
		$url = str_replace ( $strip, '', $url, $count );
	}

	$url = str_replace ( ';//', '://', $url );

	$url = htmlentities ( $url );

	$url = str_replace ( '&amp;', '&#038;', $url );
	$url = str_replace ( "'", '&#039;', $url );

	if ($url [0] !== '/') {
		// We're only interested in relative links from $_SERVER['PHP_SELF']
		return '';
	} else {
		return $url;
	}
}
function login_check($mysqli) {
	// Check if all session variables are set
	if (isset ( $_SESSION ['user_id'], $_SESSION ['login_string'] )) {

		$user_id = $_SESSION ['user_id'];
		$login_string = $_SESSION ['login_string'];

		// Get the user-agent string of the user.
		$user_browser = $_SERVER ['HTTP_USER_AGENT'];

		if ($stmt = $mysqli->prepare ( "SELECT password
                                      FROM reg_users
                                      WHERE user_id = ? LIMIT 1" )) {
			// Bind "$user_id" to parameter.
			$stmt->bind_param ( 'i', $user_id );
			$stmt->execute (); // Execute the prepared query.
			$stmt->store_result ();

			if ($stmt->num_rows == 1) {
				// If the user exists get variables from result.
				$stmt->bind_result ( $password );
				$stmt->fetch ();
				$login_check = hash ( 'sha512', $password . $user_browser );

				if ($login_check == $login_string) {
					// Logged In!!!!
					return true;
				} else {
					// Not logged in
					return false;
				}
			} else {
				// Not logged in
				return false;
			}
		} else {
			// Not logged in
			return false;
		}
	} else {
		// Not logged in
		return false;
	}
}
function getFullname($email) {
	return $_SESSION ['fullname'];
}
function logout($email) {
	if ($sql_user_id = $mysqli->prepare ( "SELECT user_id
                                      FROM reg_users
                                      WHERE email = ? LIMIT 1" )) {

		$stmt_user_id->bind_param ( 's', $email );
		$stmt_user_id->execute (); // Execute the prepared query.
		$stmt_user_id->store_result ();
		if ($stmt_user_id->num_rows == 1) {
			$stmt_user_id->bind_result ( $user_id );
			$stmt_user_id->fetch ();
		}
	}
	$times = date ( "Y-m-d H:i:s" );
	$sql_logout = "INSERT INTO logout VALUES (\"$user_id\",\"$times\")";
	$queryLogout = $mysqli->query ( $sql_logout );
}
?>

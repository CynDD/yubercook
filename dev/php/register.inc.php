<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
//include_once 'conexion.php';

$error_msg = "";

if (isset($_POST['email'], $_POST['p'])) {
    // Sanitize y valida los datos obtenidos del _POST
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    echo "<b>Email:</b> " . $email . "<br/>";
    echo "<b>Contraseña hasheada SIN SALT:</b> " . $_POST["p"] . "<br />";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">El correo electronico ingresado no es valido</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Configuracion de contrase�a invalida.</p>';
    }

    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT user_id FROM reg_users WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

   // check existing email
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">Un usuario con ese correo electronico ya existe</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }

    // TODO:
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

        // Create salted password
        //$password = hash('sha512', $password . $random_salt);

        // Insert the new user into the database
        $fullname = $_POST['fullname'];
        $profile_id = '0'; // Regular
        $salt = $email;
        $password = hash('sha512', $salt . $password);
        $last_login = time();
        if ($insert_stmt = $mysqli->prepare("INSERT INTO reg_users (fullname, password, email, profile_id, salt, registered, last_login) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssss', $fullname, $password, $email, $profile_id, $salt, $registered, $last_login);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }

        if ($stmt = $mysqli->prepare ( "SELECT user_id FROM reg_users WHERE email =?
              LIMIT 1" )) {
      		$stmt->bind_param ( 's', $email ); // Bind "$email" to parameter.
      		$stmt->execute (); // Execute the prepared query.
      		$stmt->store_result ();

      		// get variables from result.
      		$stmt->bind_result ($user_id);
      		$stmt->fetch ();
      		$_SESSION ['user_id'] = $user_id;
          echo "el user_id es: " . $user_id . "<br/>";
        }

        if ($login_attempts_stmt = $mysqli->prepare("INSERT INTO login_attempts (user_id, times, failed, blocked) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('isss', $user_id, $times, $failed, $blocked);
            // Execute the prepared query.
            if (! $login_attempts_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT LOGIN ATTEMPTS');
            }
        }

        header('Location: ../register_success.php');

    }
}
?>

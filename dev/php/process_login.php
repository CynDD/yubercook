<?php
include_once 'db_connect.php';
include_once 'functions.php';

if (isset($_POST['email'], $_POST['p'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	// Not a valid email
    	$error_msg .= '<p class="error">El email ingresado no es valido</p>';
    }

    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    //Tiene que existir un captcha.
    if (isset($_SESSION['failed']) && $_SESSION['failed'] < 4 && $_SESSION['failed'] > 0 && isset($_SESSION['blocked']) && $_SESSION['blocked'] !=1 ){
    	$captcha = $_POST['captcha'];
    	//Evaluo el post captcha con el session captcha
    	if (isset($captcha,$_SESSION['captcha']) && strtolower($captcha) == strtolower($_SESSION['captcha'])){
    		if (login($email, $password, $mysqli) == true) {
    			$fullname = $_SESSION['fullname'];
    			// Login correcto
    			header('Location: ../index.php');
    		} else {
    			// Login failed
    			// header('Location: ../index.php');
    			echo "<script>alert(\"No se pudo loguear correctamente.\");window.location='../login.php';</script>";
    			//header("Location: login.php?Message=pUTOOOOO" . urlencode());
    			//ECHO "<script>alert(\"\PROBELMASSSSSSSSSSS.\");window.location='../login.php';</script>";

    		}
    	}else {
    		//Indicar error en captcha
    		ECHO "<script>alert(\"El Captcha ingresado no es correcto.\");window.location='../login.php';</script>";
     	}
    } else {
    	if (login($email, $password, $mysqli) == true) {
    		$fullname = $_SESSION['fullname'];
    		// Login success
    		header('Location: ../index.php');
    	} else {
    		// Login failed
    		if (isset($_SESSION['failed']) && ($_SESSION['failed']) == 0 ){
    			print "<script>alert(\"Usuario bloqueado.\");window.location='../blocked.php';</script>";
    		}
    	}
    }


} else {
   print "<script>alert(\"No se pudo loguear correctamente.\");window.location='../login.php';</script>";
}
?>

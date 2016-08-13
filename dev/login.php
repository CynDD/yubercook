<?php
//sec_session_start();
	include_once 'php/db_connect.php';
	include_once 'php/functions.php';
  	if (login_check($mysqli) == true) {
    	$logged = 'in';
	} else {
    	$logged = 'out';
	}
?>
<html>
	<head>
		<script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
        <script type="text/javascript">
        <script>
        function showDiv(){
            if($_SESSION['failed'] != null && $_SESSION['failed'] < 4 && $_SESSION['failed'] > 0) {
            	document.getElementById("capcthaShowDiv").style.display = 'inline';
                document.getElementById("capcthaEnterDiv").style.display = 'inline';
             }
            else
            {
            	document.getElementById("capcthaShowDiv").style.display = 'none';
                document.getElementById("capcthaEnterDiv").style.display = 'none';

            }
        }
    </script>
		<title>YuberCook</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php
		include "php/navbar.php";
	 ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Login</h2>

		<!-- <form role="form" name="login" action="php/login.php" method="post"> -->
		<!-- <form role="form" name="login" action="process_login.php" method="post"> -->
		 <?php
		 /*
		  * <form role="form" name="login" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post">
		  */
		 ?>


		 <form role="form" name="login_form" action="php/process_login.php" method="post" autocomplete="off">
		 <!-- <form action="php/process_login.php" method="post" name="login_form"> -->
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
		  </div>

		  <div class="form-group">
		    <label for="password">Contrase&ntilde;a</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
		  </div>
<?php
$showDivFlag=false;
if(isset($_SESSION['failed']) &&
		!empty($_SESSION['failed']) && $_SESSION['failed'] < 4 && $_SESSION['blocked'] == 0){
	$showDivFlag=true;
}else{
	$showDivFlag=false;
}?>

		<div class="form-group" id="capcthaShowDiv" <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>
		<img src="php/showCaptcha.php" alt="captcha" />
		</div>
		<div class="form-group" id="capcthaEnterDiv" <?php if ($showDivFlag===false){?>style="display:none"<?php } ?>>
		<input type="text" id="captcha" name="captcha" required />
		</div>

		   <input type="button" class="btn btn-success"
                   value="Login"
                   onclick="return formhash(this.form, this.form.password);" />
		  <input id="cancel" name="cancel" type="button" value="Cancelar" class="btn btn-danger" onclick="location.href='index.php';">
		</form>
		<?php
        // if (login_check($mysqli) == true) {
        if (login_check($mysqli) == true) {
//         	echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
        	echo '<p>Est� logueado como ' . htmlentities($_SESSION['email']) . '.</p>';
            echo '<p>Si quiere cambiar de usuario <a href="logout.php">Cerrar Sesi�n</a>.</p>';
        } else {
//         	echo '<p>Currently logged ' . $logged . '.</p>';
        	echo '<p>Actualmente tiene la sesion cerrada. </p>';
            echo "<p>Si no posee un usuario, por favor <a href='register.php'>registrarse</a></p>";
        }
		?>
</div>
</div>
</div>

	</body>
</html>

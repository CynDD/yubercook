<?php
	include_once 'php/register.inc.php';
	include_once 'php/functions.php';
?>
<html>
	<head>
		<title>YuberCook</title>
		<script type="text/JavaScript" src="js/sha512.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script>
     	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
<div class="container">
<div class="row">
<div class="col-md-6">
		<h2>Registro</h2>
		<?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
 <form role="form" name="registration_form" action="php/register.inc.php" method="post">

 								<div class="form-group">
							    <label for="fullname">Nombre Completo</label>
							    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nombre Completo">
							  </div>
							  <div class="form-group">
							    <label for="email">Correo Electronico</label>
							    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
							  </div>
							  <div class="form-group">
							    <label for="password">Contrase&ntilde;a</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Contrase&ntilde;a">
							  </div>
							  <div class="form-group">
							    <label for="confirmpwd">Confirmar Contrase&ntilde;a</label>
							    <input type="password" class="form-control" id="confirmpwd" name="confirmpwd" placeholder="Confirmar Contrase&ntilde;a">
							  </div>
            <input type="button" class="btn btn-success"
                   value="Registrarse"
                   onclick="return regformhash(this.form,
								   this.form.fullname,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" />
        	<input id="reset" name="reset" type="reset" value="Limpiar datos" class="btn btn-warning">
          <input id="cancel" name="cancel" type="button" value="Cancelar" class="btn btn-danger" onclick="location.href='index.php';">
        </form>
		</div>
		</div>
		</div>


	</body>
</html>

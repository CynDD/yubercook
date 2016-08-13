<?php
//sec_session_start();
?>
<html>
	<head>
		<title>YuberCook</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar.php"; ?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
			<h2>USUARIO BLOQUEADO</h2>
			<p class="lead">Pongase en contacto con los administradores del sistema.</p>
			<br>
	</div>
	<div class="col-md-6">
	<form role="form" name="contact_form" action="" method="post" autocomplete="off">
		  <div class="form-group">
		    <label for="username">Nombre de usuario</label>
		    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario">
		  </div>
		  <div class="form-group">
		    <label for="email">Correo Electronico</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electronico">
		  </div>
		   <div class="form-group">
		  <label for="option">Motivo</label>
		   <select name="option">
  				<option value="blocked">Usuario bloqueado</option>
  				<option value="other">Otro</option>
<!--   				<option value=""></option> -->
<!--   				<option value=""></option> -->
			</select><br>
		</div>
	 <div class="form-group">
		 	<label>Mensaje</label>
			<textarea class="form-control" name="message" id="message" placeholder="Escriba su mensaje aqui..." style="height:100px;" required="required"></textarea>
	</div>
		<div class="form-group" id="capcthaShowDiv">
			<img src="php/showCaptcha.php" alt="captcha" />
		</div>
       	<div class="form-group" id="capcthaEnterDiv">
       		<input type="text" id="captcha" name="captcha" required />
       	</div>
       	<input type="button" name="submit" class="btn btn-success"
                value="Enviar"
                onclick="return contactformhash(this.form,
                	this.form.username,
                    this.form.email);" />
		  <input id="reset" name="reset" type="reset" value="Limpiar datos" class="btn btn-warning">
          <input id="cancel" name="cancel" type="button" value="Cancelar" class="btn btn-danger" onclick="location.href='index.php';">
		</form>

	</div>
	</div>
	</body>
</html>

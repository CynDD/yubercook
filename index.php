<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>
	<?php include 'styles.php';?>

</head>

<body>
  	<?php include 'menu_login.php';?>



 <section id="mu-registro">
   <div  id="formulario" style = "padding-left:15px";>
	    <div class="mu-registro-area">
           <div class="mu-title">

               <span class="mu-subtitle">Iniciar Sesión</span>
                    <br/>
                    <i class="fa fa-spoon"></i>
                    <span class="mu-title-bar"></span>
             </div>

	<div class="mu-registro-content">
		<form class="form-horizontal" method="POST" action='ValidarUsuario.php' id="formularioLogin">
      <div class="row">
        <div class="form-group">
            <label class="control-label col-md-2" style="color: white">Email:</label>
            <div class="col-md-8">
               <input type="email" class="form-control" id="inputEmail" name ="inputEmail" placeholder="Email">
            </div>
         </div>
         <div id = "inputEmailAlert" class = "col-md-6 alert alert-warning" role="alert" hidden = "true">
           <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
           <strong>Atención!</strong> Debe ingresar su correo electrónico.
         </div>
        </div>
        <div class="row">
          <div class="form-group">
            <label class="control-label col-md-2" style="color: white">Contraseña:</label>
              <div class="col-md-8">
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña">
              </div>
            </div>
        <div id = "inputPasswordAlert" class = "col-md-6 alert alert-warning" role="alert" hidden = "true">
          <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
          <strong>Atención!</strong> Debe ingresar su contraseña.
        </div>
        <!-- <div id = "inputPasswordWrong" class = "col-md-6 alert alert-warning" role="alert" hidden = "true">
          <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
          <strong>Atención!</strong> Usuario y/o contraseña incorrectos.
        </div> -->
      </div>
    </br>
    </br>
  </br>
  </br>
	   <div class="form-group">
        <div class="col-md-offset-2 col-md-9" align="center">
		       <input id="reset" name="reset" type="reset" value="Limpiar datos" class="mu-browsmore-btn">
			     <button type="button" class="mu-readmore-btn" onclick="return validarInicioSesion()">Iniciar Sesión</button>
         </div>
	   </div>
    </br>
    </form>

  </div>
    </div>

   </div>
</section>
</body>
<?php include 'scripts.php';?>
</html>

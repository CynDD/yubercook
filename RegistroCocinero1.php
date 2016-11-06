  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.min.js"></script>
      <title>Yubercook | Home</title>
      <?php include 'styles.php';?>

  </head>

  <body>
  <?php include 'menu_registro.php';?>
  <section id="mu-registro" >
  <div id="formulario" style = "padding-left:15px";>

  	<!-- <form class="form-horizontal" enctype="multipart/form-data" method="POST" action='GuardarDatosCocinero.php'
    id="formularioCocinero" data-fv-framework="bootstrap" data-fv-icon-valid="glyphicon glyphicon-ok"
      data-fv-icon-invalid="glyphicon glyphicon-remove" data-fv-icon-validating="glyphicon glyphicon-refresh"> -->
  	<div class="mu-registro-area">
             <div class="mu-title">
                 <span class="mu-subtitle">Datos Personales</span>
                      <br/>
                      <i class="fa fa-spoon"></i>
                      <span class="mu-title-bar"></span>
                  </div>


  	<div class="mu-registro-content">
  		<form class="mu-registro-form" enctype="multipart/form-data" method="POST" action='GuardarDatosCocinero.php'
      id="formularioCocinero" role="form">
      <div class="row">
        <div class="form-group">
  				<label class="control-label col-md-2" for="inputErrorNombre" style="color: white">Nombre:</label>
  			<div class="col-md-6">
  				<input type="text" class="form-control" id="nombre" name ="nombre" placeholder="Nombre">
  			</div>
  			</div>
        <div id = "nombreAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
          <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
          <strong>Atención!</strong> Debe ingresar su nombre.
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <!-- <br> -->
          <label class="control-label col-md-2" style="color: white" >Apellido:</label>
          <div class="col-md-6">
              <input type="text" class="form-control" id="apellido" name ="apellido" placeholder="Apellido">
          </div>
      </div>
      <div id = "apellidoAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su apellido.
      </div>
    </div>

    <div class="row">
      <div class="form-group">
        <!-- <br> -->
          <label class="control-label col-md-2" style="color: white" >Email:</label>
          <div class="col-md-6">
              <input type="email" class="form-control" id="inputEmail" name ="inputEmail" placeholder="Email">
          </div>
      </div>
      <div id = "inputEmailAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su correo electrónico.
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <!-- <br> -->
          <label class="control-label col-md-2" style="color: white" >Contraseña:</label>
          <div class="col-md-6">
              <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña">
          </div>
      </div>
      <div id = "inputPasswordAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su contraseña.
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <!-- <br> -->
          <label class="control-label col-md-2" style="color: white" >Confirmar Contraseña:</label>
          <div class="col-md-6">
              <input type="password" class="form-control" id="confirmaPassword" name ="confirmaPassword"  placeholder="Confirmar Contraseña">
          </div>
      </div>
    </div>
    <div class="row">
      <div id = "confirmaPasswordAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su confirmación de contraseña.
      </div>
      <div id = "passwordEqualsAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Las contraseñas deben coincidir.
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <!-- <br> -->
          <label class="control-label col-md-2" style="color: white" >Telefono:</label>
          <div class="col-md-6">
              <input type="tel" class="form-control" id="telefono" name ="telefono" placeholder="Telefono">
          </div>
      </div>
      <div id = "telefonoAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su telefono.
      </div>
    </div>
    <div class="row">
    <div class="form-group">
      <!-- <br> -->
     <label class="control-label col-md-2" style="color: white">Idiomas:</label>
     <div class="col-md-6">
       <select id="idioma" name="idiomas[]"  multiple class="form-control">
         <option value="1">Español</option>
         <option value="2">Inglés</option>
         <option value="3">Portugués</option>
         <option value="4">Italiano</option>
         <option value="5">Francés</option>
       </select>
     </div>
  </div>

  <div id = "idiomaAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
    <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
    <strong>Atención!</strong> Debe seleccionar al menos un idioma.
  </div>
</div>
  <div class="row">
     <div class="form-group">
       <!-- <br> -->
            <div class="form-group">
              <label class="control-label col-md-2" style="color: white">Fecha:</label></br>
              <div class="col-md-6">
                  <input id="fecha" name="fecha" data-provide="datepicker" data-date-format="dd/mm/yyyy">
              </div>
            </div>
          </div>
          <div id = "fechaAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
            <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
            <strong>Atención!</strong> Debe ingresar su fecha de nacimiento.
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <!-- <br> -->
          <label class="control-label col-md-2" style="color: white">Género:</label>
          <div class="col-md-2">
              <label class="radio-inline" style="color: white">
                  <input id="generoM" type="radio" name="genero" value="masculino"> Masculino
              </label>
          </div>
          <div class="col-md-2">
              <label class="radio-inline" style="color: white">
                  <input id="generoF" type="radio" name="genero" value="femenino"> Femenino
              </label>
          </div>
      </div>

      <div id = "generoAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su género
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <!-- <br> -->
          <label class="control-label col-md-2" style="color: white">Especialidades:</label></br>
          <div class="col-md-6">
              <textarea rows="3" class="form-control" id="especialidad" name ="especialidad" placeholder="Especialidades"></textarea>
          </div>
      </div>
      <div id = "especialidadAlertCocinero" class = "col-md-4 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar su especialidad.
      </div>
    </div>
      <!-- <br> -->
<div class="row">
      <div class="form-group">
          <div class="col-md-offset-2 col-md-9" align="right">
  			       <input id="reset" name="reset" type="reset" value="Limpiar datos" class="mu-browsmore-btn">
  			          <button type="button" class="mu-readmore-btn" onclick="return validarRegistroCocinero()">Enviar</button>
          </div>

  	  </div>
    </div>
  	  <!-- </form> -->
      </div>
  	</form>
  	</div>
    </section>
    <?php include 'scripts.php'; ?>
  </body>
  </html>

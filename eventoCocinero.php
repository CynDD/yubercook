<?php
session_start();

if(!isset($_SESSION["statuscol"]) || $_SESSION["statuscol"]==null || $_SESSION["statuscol"]=="error" || $_SESSION["statuscol"]=="logout"){
print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">


  <title>Yubercook | Evento del Cocinero</title>

  <?php
  //include_once 'php/functions.php';
  include 'styles.php';
  ?>

</head>
<body>

  <header id="mu-header">
    <?php include 'menu_Evento.php';?>
  </header>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>
  <!-- End slider  -->

   <section id="mu-registro" name="mu-registro">
  <div id="formulario" name="formulario" style = "padding-left:15px";>

    <form id="formCocinero" class="form-horizontal" enctype="multipart/form-data" method="POST" action="#" onsubmit="javascript:obtenerParametros()">
    <br/>
    <br/>
    <div class="mu-registro-area">
      <div class="mu-title">
        <span class="mu-subtitle">Nueva comida</span>
        <br/>
        <i class="fa fa-spoon"></i>
        <span class="mu-title-bar"></span>
      </div>
      <!--p class="text-center">Datos personales</p>-->
    </div>
    <div class="mu-registro-content">
      <form class="mu-registro-form">
        <div class="form-group">
          <label class="control-label col-md-3 " style="color: white" >Nombre de la comida:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="nombreComida" name ="nombre" placeholder="Nombre de la comida">
          </div>
        </div>
        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "nombreAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar el nombre de la comida.
      </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Imagen:</label>
          <div class="col-md-8">
            <input type="file" accept="image/*" name="imagenComida" id="imagenComida" /><br><br>
          </div>
        </div>
        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "imagenAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar la imagen de la comida.
      </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Precio $U :</label>
          <div class="col-md-8">
            <input type="number" class="form-control" id="inputPrecio" name ="inputPrecio" placeholder="Precio $U">
          </div>
        </div>

        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "inputPrecioAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar el precio de la comida.
      </div>
       </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Descripción de la comida:</label>
          <div class="col-md-8">
            <textarea rows="3" class="form-control" id="descripcionComida" name ="descripcionComida" placeholder="Descripción de la comida"></textarea>
          </div>
        </div>
        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "descripcionAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar la descripción de la comida..
      </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Cantidad mínima de personas</label>
          <div class="col-md-8">
            <input type="number" class="form-control" id="cantMinPersonas" name ="cantMinPersonas" placeholder="Cantidad mínima de personas">
          </div>
        </div>
        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "cantMinAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar la cantidad mínima para ver la oferta.
      </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Cantidad máxima de personas</label>
          <div class="col-md-8">
            <input type="number" class="form-control" id="cantMaxPersonas" name ="cantMaxPersonas" placeholder="Cantidad máxima de personas">
          </div>
        </div>
        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "cantMaxAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe ingresar el nombre de la comida.
           </div>
        </div>

        <div class="form-group">
            <div class="form-group">
              <label class="control-label col-md-3" style="color: white" for="inicioComida">Inicio:</label></br>
              <div class="col-md-3">
                <div class='input-group date' id='inicioComidaCalendar'  >
                  <input type='text' class="form-control" name='inicioComida' id='inicioComida'/>
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar" for=""></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="col-md-3">
            </div>
        <div id = "inicioAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
          <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
          <strong>Atención!</strong> Debe ingresar el inicio de la comida.
             </div>
          </div>

          <div class="form-group">
            <div class="form-group">
              <label class="control-label col-md-3" style="color: white">Fin:</label></br>
              <div class="col-md-3">
                <div class='input-group date' id='finComidaCalendar'  >
                  <input type='text' class="form-control" name='finComida' id='finComida' />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="col-md-3">
            </div>
        <div id = "finAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
          <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
          <strong>Atención!</strong> Debe ingresar el fin de la comida.
             </div>
          </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Apto para celíacos:</label>
          <div class="col-md-2">
            <label class="radio-inline" style="color: white">
              <input id="Si" type="radio" name="aptoCeliacos" value="si"> Si
            </label>
          </div>
          <div class="col-md-2">
            <label class="radio-inline"  style="color: white">
              <input id = "No" type="radio" name="aptoCeliacos" value="no" > No
            </label>
          </div>
        </div>

        <div class="form-group" >
          <div class="col-md-3">
          </div>
      <div id = "aptoCeliacosAlertComida"  class = "col-md-8 alert alert-warning" role="alert" hidden = "true">
        <a href = "#" class = "close" data-dismiss = "alert">&times;</a>
        <strong>Atención!</strong> Debe seleccionar si la comida es apta para celíacos.
           </div>
        </div>
        <br>


		   <!-- Start Map section -->
		   <div class="form-group">
				<section id="mu-map">
					<label class="control-label col-md-3" style="color: white">Ubicación de la comida:</label>
					<iframe id="mapaReferencia" src="pepe.html" width="100%" height="100%" frameborder="0"allowfullscreen></iframe>
				</section>
			</div>
		<!-- End Map section -->

    <br>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-9" align="right">

        <input id="cancel" name="cancel" type="button" value="Cancelar" class="mu-browsmore-btn" onclick="location.href='index.php';">
                  <input id="reset" name="reset" type="reset" value="Limpiar datos" class="mu-browsmore-btn">
           <button type="submit" class="mu-readmore-btn" onclick="return validarEventoCocinero()">Crear comida</button>

      </div>
        </form>
      </div>

    </div>
  </form>
</div>
 </section>

<script src="js/validarEventoCocinero.js" type="text/javascript"></script>
<script type="text/javascript">
	function obtenerParametros(){

		var latitud = window.frames["mapaReferencia"].contentWindow.document.getElementById('latitud').value;
		var longitud = window.frames["mapaReferencia"].contentWindow.document.getElementById('longitud').value;
		document.getElementById('formCocinero').action = 'guardarEventoCocinero.php?latitud=' + latitud + '&longitud=' + longitud;
	}
</script>
<?php include 'scripts.php';?>

</body>
</html>

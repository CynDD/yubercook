<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="themes/readable/bootstrap.css">
    <link rel="stylesheet" href="css/datepicker.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
  <title>Yubercook | Home</title>
  <?php
  //include_once 'php/functions.php';
  include 'styles.php';
  ?>

</head>
<body>

  <header id="mu-header">
    <?php include 'menu.php';?>
  </header>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>
  <!-- End slider  -->

   <section id="mu-registro">
  <div id="formulario" style = "padding-left:15px";>

    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action='guardarEventoCocinero.php'>
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
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Imagen:</label>
          <div class="col-md-8">
            <input type="file" accept="image/*" name="imagenComida" id="imagenComida" /><br><br>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Precio $U :</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="inputPrecio" name ="inputPrecio" placeholder="Precio $U">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Ubicación de la comida:</label>
          <div class="col-md-8">
            <input type="text" class="form-control" id="inputUbicacion" name="inputUbicacion" placeholder="Ubicación de la comida">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Descripción de la comida:</label>
          <div class="col-md-8">
            <textarea rows="3" class="form-control" id="descripcionComida" name ="descripcionComida" placeholder="Descripción de la comida"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Cantidad mínima de personas</label>
          <div class="col-md-8">
            <input type="number" class="form-control" id="cantMinPersonas" name ="cantMinPersonas" placeholder="Cantidad mínima de personas">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Cantidad máxima de personas</label>
          <div class="col-md-8">
            <input type="number" class="form-control" id="cantMaxPersonas" name ="cantMaxPersonas" placeholder="Cantidad máxima de personas">
          </div>
        </div>
        <!-- <div class="form-group">
          <label class="control-label col-md-3" style="color:white">Fecha y hora:</label>
            <div type="text" class="input-append date" >
                <input  id="datetimepicker" name="datetimepicker" ></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
            </div>
        </div>
            <script type="text/javascript">
                $('#datetimepicker').datetimepicker({
                format: 'dd/MM/yyyy hh:mm:ss',
                language: 'pt-BR'
               });
            </script>
        </div> -->
        <div class="form-group">
            <div class="form-group">
              <label class="control-label col-md-3" style="color: white">Inicio:</label></br>
              <div class="col-md-3">
                <div class='input-group date' id='inicioComida'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group">
              <label class="control-label col-md-3" style="color: white">Fin:</label></br>
              <div class="col-md-3">
                <div class='input-group date' id='finComida'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Apto para celíacos:</label>
          <div class="col-md-2">
            <label class="radio-inline" style="color: white">
              <input type="radio" name="aptoCeliacos" value="si"> Si
            </label>
          </div>
          <div class="col-md-2">
            <label class="radio-inline"  style="color: white">
              <input type="radio" name="aptoCeliacos" value="no" > No
            </label>
          </div>
        </div>


        <br>
        <div class="form-group">
          <div class="col-md-offset-2 col-md-9" align="right">
            <!-- <button type="reset" class="mu-reset-btn">Limpiar datos</button>
            <button type="submit" class="mu-send-btn" onsubmit="return validarEventoCocinero()">Crear comida</button> -->

            <!--<input type="button" class="btn btn-success"    value="Crear comida"  onclick="return validarEventoCocinero();" />-->
            <input id="cancel" name="cancel" type="button" value="Cancelar" class="mu-browsmore-btn" onclick="location.href='index.php';">
                    	<input id="reset" name="reset" type="reset" value="Limpiar datos" class="mu-browsmore-btn">

                      <button type="submit" class="mu-readmore-btn">Crear comida</button>
          </div>
        </form>
      </div>
    </div>
  </form>
</div>
 </section>

<script src="js/validarEventoCocinero.js" type="text/javascript"></script>
<?php include 'scripts.php';?>

</body>
</html>

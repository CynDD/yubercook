<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

  <?php
  // PROCESO PARA VER EL DETALLE DE LOS EVENTOS

  include'conexion.php';
  $idevento = $_GET["idevento"];


  $sqlCont = "SELECT c.nombreComida, c.descripcion, c.imagen, e.precio, e.cantminpersonas,e.cantmaxpersonas, e.aptoCeliaco, e.fecha FROM evento e
              inner join comida c on c.idcomida = e.idcomida
              inner join usuario u on u.idusuario = e.idcocinero
              where idevento='".$idevento."'";
  //echo $sqlCont;
  $resultCont = mysql_query($sqlCont,$conex);
  $reg = mysql_fetch_array($resultCont);

  $nombre = "  $reg[nombreComida]";
  $descripcion  = "$reg[descripcion]";
  $imagen  = "$reg[imagen]";
  $precio = " $reg[precio]";
  $cantminpersonas  = "$reg[cantminpersonas]";
  $cantmaxpersonas = "$reg[cantmaxpersonas]";
  $fecha ="$reg[fecha]";
  $apto ="$reg[aptoCeliaco]";
?>

  <div id="formulario" style = "padding-left:15px";>

    <form class="form-horizontal" enctype="multipart/form-data" method="POST" >
    <br/>
    <br/>
    <br/>
    <div class="mu-registro-area">
      <div class="mu-title">
        <span class="mu-subtitle">Detalle del evento</span>
        <br/>
        <i class="fa fa-spoon"></i>
        <span class="mu-title-bar"></span>
      </div>
      <!--p class="text-center">Datos personales</p>-->
    </div>
    <div class="mu-registro-content">
      <form class="mu-registro-form">
        <div class="form-group">
          <label class="control-label col-md-3 " >Nombre de la comida:</label>
          <div class="col-md-8">
              <label   class="control-label"  id="nombreComida" name ="nombre" readonly> <?php echo $nombre;?> </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" >Imagen:</label>
          <div class="col-md-8">
              <img     type="file" accept="image/*"> <?php echo $imagen;?> </img>
          </div>

        </div>
        <div class="form-group">
          <label class="control-label col-md-3" >Precio $U :</label>
          <div class="col-md-8">
              <label  class="control-label"  id="inputPrecio" name ="inputPrecio" readonly> <?php echo $precio;?> </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" >Descripción de la comida:</label>
          <div class="col-md-8">
            <label rows="3"  class="control-label" id="descripcionComida"  name ="descripcionComida" readonly> <?php echo $descripcion;?> </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3"  >Cantidad mínima de personas</label>
          <div class="col-md-8">
            <label  type="number" class="control-label"  id="cantMinPersonas" name ="cantMinPersonas" readonly><?php echo $cantminpersonas;?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3"  >Cantidad máxima de personas</label>
          <div class="col-md-8">
            <label type="number" class="control-label"  id="cantMaxPersonas" name ="cantMaxPersonas"  readonly><?php echo $cantmaxpersonas;?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3"  >Apto para celíacos:</label>
          <div class="col-md-2">
              <label  type="text"  class="control-label" name="aptoCeliacos"  readonly><?php echo $apto;?></label>

          </div>
        </div>

          <div class="form-group" >
            <label class="control-label col-md-3" >Fecha y Hora:</label></br>
            <div class="col-md-8">
                <label   id="fecha" name="fecha" data-provide="datepicker" data-date-format="dd/mm/yyyy"  readonly><?php echo $fecha;?></label>
            </div>
          </div>
          <div class="form-group">
           <section id="mu-map">
             <label class="control-label col-md-3" style="color: white">Ubicación de la comida:</label>
             <iframe id="mapaReferencia" src="mapaEvento.html" width="100%" height="100%" frameborder="0"allowfullscreen></iframe>
           </section>
         </div>

        <br>

        </form>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript">
	function obtenerParametros(){

		var latitud = window.frames["mapaReferencia"].contentWindow.document.getElementById('latitud').value;
		var longitud = window.frames["mapaReferencia"].contentWindow.document.getElementById('longitud').value;
		//alert('guardarEventoCocinero.php?latitud=' + latitud + '&longitud=' + longitud);
		document.getElementById('formCocinero').action = 'prueba.php?latitud=' + latitud + '&longitud=' + longitud;
	}
</script>

<?php include 'scripts.php'; ?>
</body>
</html>

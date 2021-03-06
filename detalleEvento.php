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

  <title>Yubercook | Detalle evento</title>
  <?php
  //include_once 'php/functions.php';
  include 'styles.php';
  ?>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>
  <!-- End slider  -->
</head>
<body onload="cargarPunto()">


  <?php
  // PROCESO PARA VER EL DETALLE DE LOS EVENTOS
  include'conexion.php';
  $idevento = $_GET["idevento"];

  $sqlCont = "SELECT c.nombreComida, c.descripcion,  u.idusuario, c.imagen, ub.latitud,ub.longitud, e.precio, e.cantminpersonas,e.cantmaxpersonas,
				e.aptoCeliaco, e.fecha, c.idcomida, u.idrol
				FROM evento e
					inner join comida c on c.idcomida = e.idcomida
					inner join usuario u on u.idusuario = e.idcocinero
			        inner join ubicacion ub on ub.idubicacion = e.idubicacion
				WHERE idevento = ".$idevento;
  //echo $sqlCont;
  $resultCont = mysql_query($sqlCont,$conex);
  $reg = mysql_fetch_array($resultCont);
	$idusuario=$_SESSION["idusuario"]; //Para que se almacene en idusuario el id del usuario que este logueado
    $idrol=$_SESSION["idrol"];
  $nombre = "  $reg[nombreComida]";
  $descripcion  = "$reg[descripcion]";
  $imagen  = "$reg[imagen]";
  $precio = " $reg[precio]";
  $cantminpersonas  = "$reg[cantminpersonas]";
  $cantmaxpersonas = "$reg[cantmaxpersonas]";
  $fecha ="$reg[fecha]";
  $apto ="$reg[aptoCeliaco]";
  $latitud="$reg[latitud]";
  $longitud="$reg[longitud]";
  $idcomida="$reg[idcomida]";
?>
<header id="mu-header">
	   <?php if ($idrol == 2){
		   include 'menu_Comensal.php';
         $_SESSION["id"]=true;
	   } else if ($idrol == 1){
			include 'menu_Cocinero.php';
        $_SESSION["id"]=false;
	   } else {
		   echo "Error en el id de rol.";
	   }?>
  </header>


<section id="mu-registro">
  <div id="formulario" style = "padding-left:15px";>

    <form class="form-horizontal" id="detalleEvento" enctype="multipart/form-data" method="POST" action='guardarCompraComensal.php' >
		<input id="latitud" type="hidden" value="<?php echo $latitud;?>" />
		<input id="longitud" type="hidden" value="<?php echo $longitud;?>" />
		<input id="idusuario" name="idusuario" type="hidden" value="<?php echo $idusuario;?>" />
		<input id="idevento" name="idevento" type="hidden" value="<?php echo $idevento;?>" />
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
          <label class="control-label col-md-3 " style="color: white">Nombre de la comida:</label>
          <div class="col-md-8">
              <label   class="control-label"  id="nombreComida" name ="nombre" readonly style="color: white"> <?php echo $nombre;?> </label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Imagen:</label>
          <div class="col-md-8">
              <?php echo '<img src="blob.php?id=' . $idcomida . '" alt="Img" />'; ?>
          </div>

        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white">Precio $U :</label>
          <div class="col-md-8">
              <label  class="control-label"  id="inputPrecio" name ="inputPrecio" readonly style="color: white"> <?php echo $precio;?> </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Descripción de la comida:</label>
          <div class="col-md-8">
            <label rows="3"  class="control-label" id="descripcionComida"  name ="descripcionComida" readonly style="color: white"> <?php echo $descripcion;?> </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Cantidad mínima de personas</label>
          <div class="col-md-8">
            <label  type="number" class="control-label"  style="color: white"  id="cantMinPersonas" name ="cantMinPersonas" readonly><?php echo $cantminpersonas;?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Cantidad máxima de personas</label>
          <div class="col-md-8">
            <label type="number" class="control-label" style="color: white" id="cantMaxPersonas" name ="cantMaxPersonas"  readonly><?php echo $cantmaxpersonas;?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" style="color: white" >Apto para celíacos:</label>
          <div class="col-md-2">
              <label  type="text"  class="control-label" style="color: white" name="aptoCeliacos"  readonly><?php echo $apto;?></label>

          </div>
        </div>

          <div class="form-group" >
            <label class="control-label col-md-3" style="color: white">Fecha y Hora:</label></br>
            <div class="col-md-8">
                <label   id="fecha" style="color: white" name="fecha" data-provide="datepicker" data-date-format="dd/mm/yyyy"  readonly><?php echo $fecha;?></label>
            </div>
          </div>
		<!-- Start Map section -->
		   <div class="form-group">
				<section id="mu-map">
					<label class="control-label col-md-3" style="color: white">Ubicación de la comida:</label>
					<iframe id="mapaReferencia" src="mapaEvento.html" width="100%" height="100%" frameborder="0"allowfullscreen></iframe>
				</section>
			</div>
		<!-- End Map section -->


      <br>
	  <?php if($idrol == 2){ echo'<div class="pull-right">'.
			  '<div class="form-group">'.
				'<button id ="comprar" type="button" class="mu-readmore-btn" onclick="submit()">Comprar</button>'.
			  '</div>'.
	  '</div>';}
		?>
        <br>
        </form>
      </div>
    </div>
  </form>
</div>
</section>

<script type="text/javascript">
	function cargarPunto(){
		var lat = document.getElementById('latitud').value;
		var lon = document.getElementById('longitud').value;
		window.frames["mapaReferencia"].contentWindow.geocodeLatLng(lat,lon);
	}
</script>




<?php include 'scripts.php'; ?>
</body>
</html>

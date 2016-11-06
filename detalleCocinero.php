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
</head>
<body onload="cargarPunto()">

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

 $idusuario= $_GET["idcocinero"];



  $sqlCont = "SELECT nombre,apellido,fnacimiento,telefono,genero,especialidades
                FROM usuario
              where idusuario=".$idusuario ;


  $resultCont = mysql_query($sqlCont,$conex);
  $reg = mysql_fetch_array($resultCont);

  $nombre = "$reg[nombre]";
  $apellido  = "$reg[apellido]";
  $fnacimiento  = "$reg[fnacimiento]";
  $telefono = " $reg[telefono]";
  $genero  = "$reg[genero]";
  $especialidades = "$reg[especialidades]";

?>
  <div id="formulario" style = "padding-left:15px";>

    <form class="form-horizontal" id="detalleCocinero" >

	<br/>
    <br/>
    <br/>
    <div class="mu-registro-area">
      <div class="mu-title">
        <span class="mu-subtitle">Detalle del cocinero</span>
        <br/>
        <i class="fa fa-spoon"></i>
        <span class="mu-title-bar"></span>
      </div>
      <!--p class="text-center">Datos personales</p>-->
    </div>
    <div class="mu-registro-content">
      <form class="mu-registro-form">

        <div class="form-group" >
          <label class="control-label col-md-3 " >Nombre :</label>
          <div class="col-md-8">
              <label   class="control-label"  id="nombre" name ="nombre" readonly> <?php echo $nombre;?> </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" >Apellido:</label>
          <div class="col-md-8">
              <label  class="control-label"  id="apellido" name ="apellido" readonly> <?php echo $apellido;?> </label>
          </div>
        </div>
        <div class="form-group" >
          <label class="control-label col-md-3" >Fecha de Nacimiento:</label></br>
          <div class="col-md-8">
              <label   id="fecha" name="fecha" data-provide="datepicker" data-date-format="dd/mm/yyyy"  readonly><?php echo $fnacimiento;?></label>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3"  >Telefono:</label>
          <div class="col-md-8">
            <label  type="number" class="control-label"  id="telefono" name ="telefono" readonly><?php echo $telefono;?></label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3" >Género:</label>
          <div class="col-md-8">
            <label rows="3"  class="control-label" id="Genero"  name ="genero" readonly> <?php echo $genero;?> </label>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-3"  >Especialidades</label>
          <div class="col-md-8">
            <label  type="number" class="control-label"  id="especialidades" name ="especialidades" readonly><?php echo $especialidades;?></label>
          </div>
        </div>


        <br>

        </form>
      </div>
    </div>
  </form>
</div>

<?php include 'scripts.php'; ?>
</body>
</html>

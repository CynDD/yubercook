<?php
session_start();

if(!isset($_SESSION["statuscol"]) || $_SESSION["statuscol"]==null || $_SESSION["statuscol"]=="error" || $_SESSION["statuscol"]=="logout"){
print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}

?>
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
  <header id="mu-header">
    <?php include 'menu_Comensal.php';?>
  </header>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>

<section id="mu-contact">



	<div class="table-responsive" id="latabla"></div>
</div>
</section>
  <?php include 'scripts.php';?>
  <script type="text/javascript" src="js/jason.js"></script>
  <script type="text/javascript">
	$.ajax({
    // la URL para la petición
    //url : 'http://localhost/ServicioRestCook/eventos',
	url : 'http://localhost/ServicioRestCook/eventosTabla',
    // especifica si será una petición POST o GET
    type : 'GET',

    // el tipo de información que se espera de respuesta
	dataType : 'text',

    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(json) {
		llenarTabla(json);
    },

    // código a ejecutar si la petición falla;
    // son pasados como argumentos a la función
    // el objeto de la petición en crudo y código de estatus de la petición
    error : function(xhr, status) {
        alert('Disculpe, existió un problema');
    },
    // código a ejecutar sin importar si la petición falló o no
    complete : function(xhr, status) {
    }
});
  </script>

</body>
</html>

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

  <title>Yubercook | Ver eventos del Comensal</title>
  <?php
  //include_once 'php/functions.php';
  include 'styles.php';
  ?>
</head>
<body>

  <header id="mu-header">
    <?php include 'menu_Comensal.php';?>
  </header>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>
  <!-- End slider  -->

  <?php
  // PROCESO PARA VER EL DETALLE DE LOS EVENTOS

  include'conexion.php';

 $idcomensal= $_SESSION["idusuario"];
/*
select e.idevento, c.nombreComida, e.fecha, e.cantminpersonas, e.cantmaxpersonas
from evento e, comida c
where e.idcomida = c.idcomida and idcocinero = 1;
*/
  $sqlCont = "SELECT e.idevento,c.nombreComida, e.precio, e.fecha, e.cantminpersonas, e.cantmaxpersonas
                FROM evento e, comida c
              where e.idcomida = c.idcomida and idcomensal=".$idcomensal ;

  $resultCont = mysql_query($sqlCont,$conex);
  //$reg = mysql_fetch_array($resultCont);

  $rows = array();
  while ($row = mysql_fetch_array($resultCont)){
    $rows[] = $row;
  }

  var out = "<h2 align=\"center\">Tus eventos</h2><br/><div class=\"table-responsive\" style=\"overflow-x:auto;\"><table class=\"table\"><thead><tr>" +
        "<th class=\"text-center\"><span>#</span></th>" +
        "<th class=\"text-center\"><span>Nombre de Comida</span></th>" +
    "<th class=\"text-center\"><span>Fecha</span></th>" +
    "<th class=\"text-center\"><span>Precio</span></th>" +
        "<th class=\"text-center\"><span>Cantidad Mínima</span></th>" +
        "<th class=\"text-center\"><span>Cantidad Máxima</span></th>" +
      "</tr></thead><tbody>";
      $contador = 0;
  foreach ($rows as $row) {
    $contador = $contador + 1;
    $idevento = stripslashes($row['idevento']);
    $nombreComida  = stripslashes($row['nombreComida']);
    $fecha  = stripslashes($row['fecha']);
    $cantMin = stripslashes($row['cantminpersonas']);
    $cantMax  = stripslashes($row['cantmaxpersonas']);
    out += "<tr><td class=\"text-center\">" + $contador + "</td><td class=\"text-center\">" +
    out += "<tr><td class=\"text-center\">" +
    "<a href=\"detalleEvento.php?idevento=" + $idevento + "\">" + $nombreComida + "</a>"+
    "</td><td class=\"text-center\">" + $fecha + "</td><td class=\"text-center\">" +
    $precio +
    "</td><td class=\"text-center\">" +
    $cantMin +
    "</td><td class=\"text-center\">" +
    $cantMax +
    "</td></tr>";
    }
  out += "</tbody></table></div>";
  print out;
?>


<?php include 'scripts.php'; ?>
</body>
</html>

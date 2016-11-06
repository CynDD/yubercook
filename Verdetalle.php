<?php
// PROCESO PARA VER EL DETALLE DE LOS EVENTOS

include'conexion.php';
//$idevento = $_GET["idevento"];


$sqlCont = "SELECT c.nombre, c.descripcion, e.precio, e.cantminpersonas,e.cantmaxpersonas, e.fecha FROM evento e
            inner join comida c on c.idcomida = e.idcomida
            inner join usuario u on u.idusuario = e.idcocinero

            where idevento=6";

$resultCont = mysql_query($sqlCont,$conex);
while ($reg = mysql_fetch_array($resultCont)) {
       echo "  $reg[nombre]";
       echo "  $reg[descripcion]";
       echo "  $reg[precio]";
       echo "  $reg[cantminpersonas]";
       echo "  $reg[cantmaxpersonas]";
       echo "  $reg[fecha]";


}

?>

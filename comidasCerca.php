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

  <title>Yubercook | Comidas cerca de ti</title>
  <?php
  //include_once 'php/functions.php';
  include 'styles.php';
  ?>
  <style>
  .filterable {
    margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
</style>
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
 SELECT ce.idevento, e.fecha, c.nombreComida, e.precio, e.cantcomensales, u.latitud, u.longitud
 FROM comensalevento ce, evento e, comida c, ubicacion u
 WHERE ce.idevento = e.idevento and e.idcomida = c.idcomida and e.idubicacion = u.idubicacion and ce.idusuario = 1;*/
   $sqlCont = "SELECT ce.idevento, e.fecha, c.nombreComida, e.precio, e.cantcomensales, e.cantmaxpersonas, u.latitud, u.longitud
                 FROM comensalevento ce, evento e, comida c, ubicacion u
               where ce.idevento = e.idevento and e.idcomida = c.idcomida and e.idubicacion = u.idubicacion";


  $resultCont = mysql_query($sqlCont,$conex);
  //$reg = mysql_fetch_array($resultCont);

  $rows = array();
  while ($row = mysql_fetch_array($resultCont)){
    $rows[] = $row;
  }
//$filterFoodName = "<br/><label>Buscar por nombre de comida: </label><input type=\"text\" id=\"filterFoodName\" onkeyup=\"buscarPorNombreComida()\" placeholder=\"Buscar...\">";
//echo $filterFoodName;
$filterTable = "<br/><br/><div class=\"panel panel-primary filterable\"><div class=\"panel-heading\"><h3 class=\"panel-title\">Comidas</h3><div class=\"pull-right\"><button class=\"btn btn-default btn-xs btn-filter\"><span class=\"glyphicon glyphicon-filter\"></span> Filter</button></div></div>";
echo $filterTable;

// $out = "<h2 align=\"center\">Comidas cerca de ti</h2><br/><div tclass=\"table-responsive\" style=\"overflow-x:auto;\"><table class=\"table\"><thead><tr>".
//         "<th class=\"text-center\"><span>#</span></th>".
//         "<th class=\"text-center\"><span>Nombre de Comida</span></th>".
// 		"<th class=\"text-center\"><span>Fecha</span></th>".
// 		"<th class=\"text-center\"><span>Precio</span></th>".
//     "<th class=\"text-center\"><span>Cupos disponibles</span></th>".
// 		"</tr></thead><tbody>";
$out = "<div tclass=\"table-responsive\" style=\"overflow-x:auto;\"><table class=\"table\"><thead><tr class=\"filters\">".
        "<th class=\"text-center\"><input type=\"text\" class=\"form-control\" placeholder=\"#\" disabled></th>".
        "<th class=\"text-center\"><input type=\"text\" class=\"form-control\" placeholder=\"Nombre de comida\" disabled></th>".
		"<th class=\"text-center\"><input type=\"text\" class=\"form-control\" placeholder=\"Fecha\" disabled></th>".
		"<th class=\"text-center\"><input type=\"text\" class=\"form-control\" placeholder=\"Precio\" disabled></th>".
    "<th class=\"text-center\"><input type=\"text\" class=\"form-control\" placeholder=\"Cupos disponibles\" disabled></th>".
		"</tr></thead><tbody>";

echo $out;
$out="";
      $contador = 0;
  foreach ($rows as $row) {
    $contador = $contador + 1;
    $idevento = stripslashes($row['idevento']);
    $nombreComida  = stripslashes($row['nombreComida']);
    $fecha  = stripslashes($row['fecha']);
	$precio  = stripslashes($row['precio']);
  $cantmax = stripslashes($row['cantmaxpersonas']);
	$cantCom = stripslashes($row['cantcomensales']);
  if (intval($cantmax) >= intval($cantCom)){
    $cupos = intval($cantmax) - intval($cantCom);
  } else {
    $cupos = "error";
  }
	$latitud = $row['latitud'];
  $longitud = $row['longitud'];
    $out .= "<tr><td class=\"text-center\">". $contador ."</td>"
    ."<td class=\"text-center\"><a href=\"detalleEvento.php?idevento=" . $idevento ."\">". $nombreComida ."</a>".
    "</td><td class=\"text-center\">" . $fecha ."</td><td class=\"text-center\">".$precio.
    "</td><td class=\"text-center\">".$cupos."</td></tr>";
    }
  $out .= "</tbody></table></div></div></div>";
   echo $out;
?>


<?php include 'scripts.php'; ?>
<script type="text/javascript">
//  var latitudU = position.coords.latitude;
//  var longitudU = position.coords.longitude;
</script>
<?php
  //$_SESSION['latitudUser'] = "<script>document.write(latitudU)</script>";
//  $_SESSION['longitudUser'] = "<script>document.write(longitudU)</script>";
?>
<div class="form-group">
 <!-- <section id="mu-map">
   <label class="control-label col-md-3" style="color: white">Eventos cerca de ti:</label> -->
   <!-- <div id="map"></div> -->
   <div id="map-canvas"></div>
   <!-- <iframe id="mapaDeEventos" src="mapaDeEventos.html" width="100%" height="100%" frameborder="0"allowfullscreen></iframe> -->
 <!-- </section> -->
</div>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgXZDnKa1eao5nyJ6bXzawkYETLw_SqKY&signed_in=true&callback=initMap&sensor=true"
    async defer></script> -->
<script type="text/javascript">
// var myLatLng;
// 	function obtenerEventosMapa(){
// 		var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};
//     var map = new google.maps.Map(document.getElementById('map'), {
//         zoom: 4,
//         center: myLatLng
//       });
//       var markers =  '<?php json_encode($rows); ?>;'
//       for (var i = 0; i < markers.length; i++) {
//         var data = markers[i];
//         latLng = new google.maps.LatLng(data.latitud, data.longitud);
//         var marker = new google.maps.Marker({
//           position: latLng,
//           map: map,
//           title: data.nombreComida
//         });
//       }
// 	  }
//
/*
var map;
var pos;
function initialize() {
    var mapOptions = {
        zoom: 6,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    // Try HTML5 geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            pos = new google.maps.LatLng(position.coords.latitude,
            position.coords.longitude);

            map.setCenter(pos);
        }, function () {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }

    function handleNoGeolocation(errorFlag) {
        if (errorFlag) {
            var content = 'Error: The Geolocation service failed.';
        } else {
            var content = 'Error: Your browser doesn\'t support geolocation.';
        }

        var options = {
            map: map,
            position: new google.maps.LatLng(-29.3456, 151.4346),
            content: content
        };
        var infowindow = new google.maps.InfoWindow(options);
        map.setCenter(options.position);
    }

    var marker = new google.maps.Marker({
        position: pos,
        title: 'Position',
        map: map,
        draggable: true,
        visible: true
    });

    updateMarkerPosition(pos);
    geocodePosition(pos);
    google.maps.event.addListener(marker, 'drag', function () {

        updateMarkerPosition(marker.getPosition());
    });
    $('#button').click(function () {
        marker.setVisible(true);
    });

}
*/
</script>
<script>
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');

        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();

        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No se encontraron resultados</td></tr>'));
        }
    });
});</script>
</body>
</html>

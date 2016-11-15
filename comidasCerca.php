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
<body onload="obtainGeolocation()">

  <header id="mu-header">
    <?php include 'menu_Comensal.php';?>
  </header>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>
  <!-- End slider  -->
<br>
<br>
  <?php
  // PROCESO PARA VER EL DETALLE DE LOS EVENTOS

  include'conexion.php';


 $idcomensal= $_SESSION["idusuario"];
 /*
 SELECT ce.idevento, e.fecha, c.nombreComida, e.precio, e.cantcomensales, u.latitud, u.longitud
 FROM comensalevento ce, evento e, comida c, ubicacion u
 WHERE ce.idevento = e.idevento and e.idcomida = c.idcomida and e.idubicacion = u.idubicacion and ce.idusuario = 1;*/
   $sqlCont =  "SELECT e.idevento, e.idcocinero, c.nombreComida ,e.fecha, e.precio, u.nombre,u.apellido, e.cantcomensales, e.cantminpersonas, e.cantmaxpersonas
			FROM evento e inner join comida c inner join usuario u
			where e.idcomida=c.idcomida and e.idcocinero=u.idusuario;";


  $resultCont = mysql_query($sqlCont,$conex);
  //$reg = mysql_fetch_array($resultCont);

  $rows = array();
  while ($row = mysql_fetch_array($resultCont)){
    $rows[] = $row;
  }
//$filterFoodName = "<br/><label>Buscar por nombre de comida: </label><input type=\"text\" id=\"filterFoodName\" onkeyup=\"buscarPorNombreComida()\" placeholder=\"Buscar...\">";
//echo $filterFoodName;
$filterTable =  " <h2 align=\"center\" >Eventos disponibles</h2><br/><div id=\"eventos\" class=\"panel panel-primary filterable\"><br/><div class=\"panel-heading\"><h3 class=\"panel-title\"></br> </h3><div class=\"pull-right\"><button class=\"btn btn-default btn-xs btn-filter\"><span class=\"glyphicon glyphicon-filter\"></span> Filtros </button></div></div>";
echo $filterTable;


$out = "<div tclass=\"table-responsive\" style=\"overflow-x:auto;\"><table class=\"table\"><thead><tr class=\"filters\">".
        "<th class=\"text-center\"><input type=\"text\" class=\"form-control text-center\" placeholder=\"#\" disabled></th>".
        "<th class=\"text-center\"><input type=\"text\" class=\"form-control text-center\" placeholder=\"Nombre de comida\" disabled></th>".
		"<th class=\"text-center\"><input type=\"text\" class=\"form-control text-center\" placeholder=\"Fecha\" disabled></th>".
    "<th class=\"text-center\"><input type=\"text\" class=\"form-control text-center\" placeholder=\"Nombre cocinero\" disabled></th>".
		"<th class=\"text-center\"><input type=\"text\" class=\"form-control text-center\" placeholder=\"Precio\" disabled></th>".
    "<th class=\"text-center\"><input type=\"text\" class=\"form-control text-center\" placeholder=\"Cupos disponibles\" disabled></th>".
		"</tr></thead><tbody>";

echo $out;
$out="";
      $contador = 0;
      $puntos = array();
  foreach ($rows as $row) {
    $contador = $contador + 1;
    $idevento = stripslashes($row['idevento']);
    $idcocinero = stripslashes($row['idcocinero']);
    $nombreComida  = stripslashes($row['nombreComida']);
    $nombreCocinero = stripslashes($row['nombre']) . " " . stripslashes($row['apellido']);
    $fecha  = stripslashes($row['fecha']);
	  $precio  = stripslashes($row['precio']);
    $cantmax = stripslashes($row['cantmaxpersonas']);
	   $cantCom = stripslashes($row['cantcomensales']);
     if (intval($cantmax) >= intval($cantCom)){
       $cupos = intval($cantmax) - intval($cantCom);
     } else {
       $cupos = "error";
     }


  $out .= "<tr><td class=\"text-center\">". $contador ."</td>"
    ."<td class=\"text-center\"><a href=\"detalleEvento.php?idevento=" . $idevento ."\">". $nombreComida ."</a>".
    "</td><td class=\"text-center\">" . $fecha ."</td><td class=\"text-center\"><a href=\"detalleCocinero.php?idcocinero=".$idcocinero."\">" .$nombreCocinero ."</a>".
    "</td><td class=\"text-center\">".$precio.
    "</td><td class=\"text-center\">".$cupos."</td></tr>";
    }
  $out .= "</tbody></table></div></div></div>";
   echo $out;
?>


<?php include 'scripts.php'; ?>
<script type="text/javascript">
  //var latitudU = position.coords.latitude;
  //var longitudU = position.coords.longitude;
</script>

<!-- <div class="form-group"> -->
 <section id="mu-map">
   <label class="control-label col-md-3" style="color: white">Eventos cerca de ti:</label>
   <!-- <div id="map"></div> -->
   <div id="map-canvas"></div>
   <!-- <iframe id="mapaDeEventos" src="mapaDeEventos.html" width="100%" height="100%" frameborder="0"allowfullscreen></iframe> -->
 </section>
<!-- </div> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgXZDnKa1eao5nyJ6bXzawkYETLw_SqKY&signed_in=true&callback=initMap"
    async defer></script>
    <script>
    $(document).ready(function(){
      lat = "<?php echo $puntos['latitud']; ?>" ;
      lng = "<?php echo $puntos['longitud']; ?>" ;
      titulo = "<?php echo $puntos['titulo']; ?>" ;
      var map;
      function initialize() {
/*
        var myLatlng = new google.maps.LatLng(lat,lng);
        var mapOptions = {
          zoom: 7,
          center: myLatlng,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);
        var marker = new google.maps.Marker({
          position: myLatlng,
          draggable:true,
          animation: google.maps.Animation.DROP,
          web:"Localización geográfica!",
          icon: "marker.png"
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
          var myLatLng = event.latLng;
          lat = myLatLng.lat();
          lng = myLatLng.lng();
          document.getElementById('info').innerHTML = [
          lat,
          lng
          ].join(', ');
        });
        marker.setMap(map);
      }
      //google.maps.event.addDomListener(window, 'load', initialize);
      */
    });
</script>

<script type="text/javascript">
  function cargarPunto(){
  //  var lat = document.getElementById('latitud').value;
  //  var lon = document.getElementById('longitud').value;
    //window.frames["mapaReferencia"].contentWindow.geocodeLatLng(lat,lon);
  }

  function obtainGeolocation(){
    //obtener la posición actual y llamar a la función  "localitation" cuando tiene éxito
    window.navigator.geolocation.getCurrentPosition(localitation);
  }
  function localitation(geo){
    // En consola nos devuelve el Geoposition object con los datos nuestros
    console.log(geo);
  }
  //llamando la funcion inicial para ver trabajar la API
  obtainGeolocation();
  var map;
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -34.397, lng: 150.644},
      zoom: 8
    });
  }
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

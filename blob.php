<?php 
header("Content-type: image/png");
include'conexion.php';
if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $q = "SELECT imagen FROM comida WHERE idcomida = '$id'"; 
    $result = mysql_query($q, $conex) or die ("Error al consultar");
    while ($row = mysql_fetch_assoc($result)) { 
		echo $row["imagen"]; 
    }
    mysql_free_result($result); 
} else { 
	echo 'NO ID'; 
} 
?>
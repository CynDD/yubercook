<?php
//conexion a la base de datos
include'conexion.php';

//si la variable imagen no ha sido definida nos dara un advertencia.
$id = $_GET['id'];
echo "242422442";
if ($id > 0){
	//vamos a crear nuestra consulta SQL
	$consulta = "SELECT c.imagen FROM comida c, evento e WHERE c.idcomida=e.idcomida and e.idevento = $id";
	
	//con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
	//de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
	$resultado= @mysql_query($consulta) or die(mysql_error());
	echo "LLego al select de la IMAGEN";
	//si el resultado fue exitoso
	//obtendremos el dato que ha devuelto la base de datos
	$datos = mysql_fetch_assoc($resultado);
	echo $datos;
	//ahora colocamos la cabeceras correcta segun el tipo de imagen
	header('Content-type: image/png');
	createimageandso_on();
	//ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
	$imagen = $datos['imagen'];
	

	

	echo $imagen;
}

?>
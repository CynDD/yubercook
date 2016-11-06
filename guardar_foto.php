<?php
 include'conexion.php';

    $titulo = $_POST['titulo'];
    $nombre_file = mktime() .'.jpg';
    $posicion = 0;


    $consulta = "INSERT INTO  foto  SET
        nombre='$titulo',
        archivo='$nombre_file'";


        mysql_query($consulta, $conex);

        $origen = $_FILES['archivo']['tmp_name'];
        $destino = "fotos/$nombre_file";

        move_uploaded_file ($origen, $destino);

        header("Location: fotos.php");

?>

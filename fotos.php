<?php
 include'conexion.php';

     $subconsulta="SELECT * FROM foto";

    $filas = mysql_query($subconsulta,$conex);
    while ($columnas = mysql_fetch_assoc($filas) ){
            echo '<div>';
            echo "<p>$columnas[nombre]</p>";
              echo "<img src='fotos/$columnas[archivo]' />";
            echo '</div>';
        }

?>

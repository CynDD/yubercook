<?php

        // CONECTAR AL SERVIDOR DE BASE DE DATOS
    $conex = mysql_connect('127.0.0.1','root','');

	//$conex = mysql_connect('mysql9.000webhost.com','a3958288_yc','yc1235711');
    // CONTROLAR CONEXION
    if (!$conex) {
        die("ATENCION!!!.. NO se pudo CONECTAR al Servidor de Base de Datos");
    } // endif

    // SELECCIONAR BASE DE DATOS
    $selDB = mysql_select_db("yuberdb",$conex);    
    
    // CONTROLAR SELECCION DE BASE DE DATOS
    if (!$selDB) {
        die("ATENCION!!!.. NO se pudo SELECCIONAR Base de Datos");
    } // endif

?>
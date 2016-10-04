<?php

        // CONECTAR AL SERVIDOR DE BASE DE DATOS
    //$conex = mysql_connect('127.0.0.1','root','');

	$conex = mysql_connect('db4free.net','admin__yubercook','yc1235711');
    // CONTROLAR CONEXION
    if (!$conex) {
        die("ATENCION!!!.. NO se pudo CONECTAR al Servidor de Base de Datos");
    } // endif

    // SELECCIONAR BASE DE DATOS
    $selDB = mysql_select_db("yubercook__db",$conex);    
    
    // CONTROLAR SELECCION DE BASE DE DATOS
    if (!$selDB) {
        die("ATENCION!!!.. NO se pudo SELECCIONAR Base de Datos");
    } // endif

?>
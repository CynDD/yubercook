<?php

//Variables for connecting to your database.
//These variable values come from your hosting account.
$hostname = "pepuru.db.10593088.hostedresource.com";
$username = "pepuru";
$dbname = "pepuru";

//These variable values need to be changed by you before deploying
$password = "WWtotWdUN1!";
$usertable = "ing3";
$yourfield = "test";

//Connecting to your database
mysql_connect($hostname, $username, $password) OR DIE ("Unable to
connect to database! Please try again later.");
mysql_select_db($dbname);

//Fetching from your database table.
$query = "SELECT * FROM $usertable";
$result = mysql_query($query);


/*

        // CONECTAR AL SERVIDOR DE BASE DE DATOS
    $conex = @mysql_connect('127.0.0.1','root','');

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
*/
?>

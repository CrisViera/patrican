<?php

// DECLARACION DE VARIABLES PARA CONEXIÓN 

$municipio = $_GET['q'];
$usuario = "u295565183_guanchessql";
$contrasena = "Guanches1234";
$servidor = "srv927.hstgr.io";
$database = "u295565183_patrican";

// CONEXIÓN A LA BASE DE DATOS

$conexion = mysqli_connect($servidor, $usuario, $contrasena) or die ("Hay un problema con la conexión");

mysqli_select_db($conexion, $database) or die ("Hay un problema al acceder a la base de datos");

?>
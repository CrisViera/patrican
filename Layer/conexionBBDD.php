<?php

// DECLARACION DE VARIABLES PARA CONEXIÓN 

$municipio = $_GET['q'];
$usuario = "root";
$contrasena = "";
$servidor = "localhost";
$database = "paraisoaborigen";

// CONEXIÓN A LA BASE DE DATOS

$conexion = mysqli_connect($servidor, $usuario, $contrasena) or die ("Hay un problema con la conexión");

mysqli_select_db($conexion, $database) or die ("Hay un problema al acceder a la base de datos");

?>
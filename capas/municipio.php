<?php
$titulo = $_GET['m'];
// CONEXIÓN A LA BBDD

include "./capas/conexionBBDD.php";

// RECOLECION DE LOS YACIMIENTOS EN FUNCION DEL MUNICIPIO

$municipio = $_GET['m']; // OBTENER POR GET EL ID DEL MUNICIPIO
$consulta = "SELECT * FROM yacimientos WHERE municipio = '$municipio'"; // CONSULTAR TODOS LOS YACIMIENTOS DEL MUNICIPIO
$consultaMun = "SELECT nombre FROM municipios WHERE id_municipio = '$municipio'"; // CONSULTAR EL NOMBRE DEL MUNICIPIO

// ALMACENAMIENTO EN ARRAY

$yacimientos = mysqli_query($conexion, $consulta);
$nombre_municipio = mysqli_query($conexion, $consultaMun);
while ($row = mysqli_fetch_array($nombre_municipio)) {

    $nombre_mun = $row['nombre']; // OBTENER EL NOMBRE DEL MUNICIPIO
    echo "
<div class='yacimientos'>
<p class='eleccion'>Estás en ".$nombre_mun.", elije el yacimiento...</p>";
}

while ($row = mysqli_fetch_array($yacimientos)) {

    $nombre_yac_original = $row['nombre'];
    $nombre_yac = str_replace(" ", "", $row['nombre']);
    $id_yacimimento = $row['id_yacimiento'];

    echo "
            <div class='yacimiento'>
            <a href='index.php?q=yacimiento&y=".$id_yacimimento."'>
                <img src='./img/yacimientos/".$nombre_yac."/principal".$nombre_yac.".jpg' alt='".$nombre_yac."'>
                <div class='descripcion'>
                <p>".$nombre_yac_original."</p>
                </div>
            </a>
            </div>
    ";
}
echo "</div>"
?>
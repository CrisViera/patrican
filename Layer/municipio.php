<?php
$titulo = $_GET['m'];
// CONEXIÓN A LA BBDD

include "./capas/conexionBBDD.php";

// RECOLECION DEL LOS YACIMIENTOS EN FUNCION DEL MUNICIPIO

$yacimiento = $_GET['m'];
$consulta = "SELECT * FROM yacimientos WHERE municipio_yac = '$yacimiento'";

// ALMACENAMIENTO EN ARRAY

$yacimientos = mysqli_query($conexion, $consulta);

echo "
<div class='yacimientos'>";

while ($row = mysqli_fetch_array($yacimientos)) {

    $nombre_yac = $row['nombre_yac'];
    $portada_yac = $row['portada_yac'];
    $portada_yac = $row['portada_yac'];

    echo "
            <div class='yacimiento'>
            <a href='index.php?q=yacimiento&y=".$portada_yac."'>
                <img src='./img/principal".$portada_yac.".jpg' alt='".$nombre_yac."'>
                <div class='descripcion'>
                <p>".$nombre_yac."</p>
                </div>
            </a>
            </div>
    ";
}
echo "</div>"
?>
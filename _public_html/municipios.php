<?php
// CONEXIÓN A LA BBDD

include "./capas/conexionBBDD.php";

// CONSULTA DE TODOS LOS MUNICIPIOS

$consulta = "SELECT * FROM municipios";

 //ALMACENAMIENTO EN ARRAY

$municipios = mysqli_query($conexion, $consulta);

echo "
<div class='yacimientos'>
<p class='eleccion'>Escoja el municipio...</p>";

while ($row = mysqli_fetch_array($municipios)) {
    $nombre_mu = str_replace(" ", "", $row['nombre']);
    $nombre_mu_original = $row['nombre'];
    $id_municipio = $row['id_municipio'];

    echo "
    
            <div class='municipio'>
            <a href='index.php?q=municipio&m=".$id_municipio."'>
                <img src='./img/principal".$nombre_mu.".png' alt='".$nombre_mu."'>
                <div class='descripcion'>
                <p>".$nombre_mu_original."</p>
                </div>
            </a>
            </div>
    ";
}
echo "</div>"
?>


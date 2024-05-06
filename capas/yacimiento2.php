<?php
// CONEXIÓN A LA BBDD

include "./capas/conexionBBDD.php";

// CONSULTA DE TODOS LOS MUNICIPIOS
$yacimiento = $_GET['y'];
$consulta = "SELECT * FROM yacimientos WHERE portada_yac = '$yacimiento'";

//ALMACENAR DATOS DEL YACIMIENTO EN ARRAY

$municipios = mysqli_query($conexion, $consulta);
$array_municipios = array();

while ($row = mysqli_fetch_array($municipios)) {
    $nombre_yac = $row['nombre_yac'];

    //Asignar cada campo a una variable
    $informacion1_yac = $row['informacion1_yac'];
    $informacion2_yac = $row['informacion2_yac'];
    $informacion3_yac = $row['informacion3_yac'];
    $informacion4_yac = $row['informacion4_yac'];
    $ubicacion_yac = $row['ubicacion_yac'];
    $enlace_yac = $row['enlace_yac'];
}
?>
<div class="yacimientoinfo">

    <div class="descripyacimiento">

        <!-- Muestra el título del yacimiento -->
        <p class="tituloyacimiento"><?php echo $nombre_yac ?></p> 

        <!-- Muestra los enlaces del yacimiento -->
        <div class="enlaces">

        <?php
            if($ubicacion_yac){
                echo "<a href='$ubicacion_yac' class='enlaceyacimiento' target='_blank'>Ubicación</a>"; // Muestra la ubicación del yacimiento si está disponible
            }
            if($enlace_yac){
                echo "<a href='$enlace_yac' class='enlaceyacimiento' target='_blank'>Youtube</a>"; // Muestra un enlace a Youtube si hay un vídeo disponible
            }
        ?>
    
        </div>

    </div> 

        
        <?php
        /* Muestra la primera linea de información del yacimiento */
        if($informacion1_yac != ""){
            echo "<div class='lineaInfoYac'>
            <p class='infoyacimiento'>
                <img src='./img/yacimientos/".$yacimiento."/".$yacimiento."_ (1).png' alt='".$nombre_yac."' class='yacimientoIzq'>
                ".$informacion1_yac."
            </p> 
            </div>";
        }

        /* Muestra la segunda linea de información del yacimiento */
        if($informacion1_yac != ""){
            echo "<div class='lineaInfoYacDer'>
            <p class='infoyacimiento'>
                <img src='./img/yacimientos/".$yacimiento."/".$yacimiento."_ (2).png' alt='".$nombre_yac."' class='yacimientoDer'>
                ".$informacion1_yac."
            </p> 
            </div>";
        }

        /* Muestra la tercera linea de información del yacimiento */
        if($informacion1_yac != ""){
            echo "<div class='lineaInfoYac'>
            <p class='infoyacimiento'>
                <img src='./img/yacimientos/".$yacimiento."/".$yacimiento." (3).png' alt='".$nombre_yac."' class='yacimientoIzq'>
                ".$informacion1_yac."
            </p> 
            </div>";
        }

        /* Muestra la cuarta linea de información del yacimiento */
        if($informacion1_yac != ""){
            echo "<div class='lineaInfoYacDer'>
            <p class='infoyacimiento'>
                <img src='./img/yacimientos/".$yacimiento."/".$yacimiento."_ (4).png' alt='".$nombre_yac."' class='yacimientoDer'>
                ".$informacion1_yac."
            </p> 
            </div>";
        }
        ?>
        
        
</div>
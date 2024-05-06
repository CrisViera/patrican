<?php
// CONEXIÓN A LA BBDD

include "./capas/conexionBBDD.php";

// CONSULTA DE TODOS LOS MUNICIPIOS
$yacimiento = $_GET['y'];
$consulta = "SELECT * FROM yacimientos WHERE portada_yac = '$yacimiento'";

//ALMACENAMIENTO EN ARRAY

$municipios = mysqli_query($conexion, $consulta);
$array_municipios = array();

while ($row = mysqli_fetch_array($municipios)) {
    $nombre_yac = $row['nombre_yac'];
    $informacion_yac = $row['informacion_yac'];
    $ubicacion_yac = $row['ubicacion_yac'];
    $enlace_yac = $row['enlace_yac'];
    $num_fotos = $row['fotos'];
}
$titulo = $nombre_yac;
?>
<div class="yacimientoinfo">

    <div class="descripyacimiento">

        <h1 class="tituloyacimiento"><?php echo $nombre_yac ?></h1>
        <p class="infoyacimiento"><?php echo $informacion_yac ?></p>

        <div class="enlaces">

        <?php
            if($ubicacion_yac){
                echo "<a href='$ubicacion_yac' class='enlaceyacimiento'>ubication</a>";
            }
            if($enlace_yac){
                echo "<a href='$enlace_yac' class='enlaceyacimiento'>Youtube</a>";
            }
        ?>

    </div>
    
        <div class="galeria">

            <div class="full-img" id="fullImgBox">
                <img src="./img/cenobio.jpg" alt="" id="fullImg">
                <span onclick="cerrarImg()">X</span>
            </div>
            
            <?php
            // BUCLE PARA OBTENER IMAGENES

            $num_fotos = $num_fotos + 1;
            for($i = 1; $i < $num_fotos; $i ++) {
                
                echo "
                <div class='galeria_item'>
                <img src='./img/yacimientos/$yacimiento/{$yacimiento}_($i).JPEG' alt='$nombre_yac' class='galeria_foto' onclick='abrirImg(this.src)'>
                        
                </div>";
            }
            ?>

        <script src="./capas/script.js"></script>
            
        </div>
    </div>

    

</div>
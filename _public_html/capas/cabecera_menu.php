<?php
// CONEXIÓN A LA BBDD

include "./capas/conexionBBDD.php";

// CONSULTA DE TODOS LOS DATOS DEL YACIMIMENTO
$id_yacimiento = $_GET['y'];
$consulta = "SELECT * FROM yacimientos WHERE id_yacimiento = '$id_yacimiento'";

//ALMACENAR DATOS DEL YACIMIENTO EN ARRAY

$info_yacimiento = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($info_yacimiento)) {

    // Asignar cada campo a una variable

    $nombre_yac = str_replace(" ", "", $row['nombre']);
  
}

?>
<div class="cabecera">

    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <p>MENÚ</p>
        </label>

        <ul>
            <li class="casa"><a href="https://patrican.es/">CASA</a></li>
            <li><a href="index.php?q=proyecto">PROYECTO</a></li>
            <li><a href="index.php?q=municipios">MUNICIPIOS</a></li>
            <li><a href="index.php?q=denuncia">RECURSOS</a></li>
        </ul>
    </nav>
    
    <div class="logo">

        <a href="https://patrican.es/" alt="Logo de Paraíso Aborigen"><img src="./img/logo.jpg" alt=""></a>

    </div> 

        <div class="menu">

            <ul>
                <li class="casa"><a href="https://patrican.es/">CASA</a></li>
                <li><a href="index.php?q=proyecto">PROYECTO</a></li>
                <li><a href="index.php?q=municipios">MUNICIPIOS</a></li>
                <li><a href="index.php?q=denuncia">RECURSOS</a></li>
            </ul>
        </div>

        <div class="portada">
            <?php
                if(isset($_GET['y'])){
                    $portada = $_GET['y'];
                    echo "<img src='./img/yacimientos/".$nombre_yac."/principal".$nombre_yac.".jpg' alt='Portada'>";                   
                }else{
                    echo "<img src='./img/portada.png' alt='Portada'>";
                }
            ?>
        </div>
            <!--
        <div class="container-all">

            <input type="radio" id="1" name="image-slide" hidden>
            <input type="radio" id="2" name="image-slide" hidden>
            <input type="radio" id="3" name="image-slide" hidden>
            <input type="radio" id="4" name="image-slide" hidden>
            <input type="radio" id="5" name="image-slide" hidden>
            <input type="radio" id="6" name="image-slide" hidden>

            <div class="slide">

                <div class="item-slide">
                    <img src="./img/slide/slide1.jpg" alt="Necrópolis de Arteara">
                </div>

                <div class="item-slide">
                    <img src="./img/slide/slide2.jpg" alt="Poblado de El Jerez">
                </div>

                <div class="item-slide">
                    <img src="./img/slide/slide3.jpg" alt="Granero de La Audiencia">
                </div>

                <div class="item-slide">
                    <img src="./img/slide/slide4.jpg" alt="Cuevas del Rey">
                </div>

                <div class="item-slide">
                    <img src="./img/slide/slide5.jpg" alt="Los Barros">
                </div>

                <div class="item-slide">
                    <img src="./img/slide/slide6.jpg" alt="El Palomar">
                </div>

            </div>

            <div class="pagination">

                <label for="1" class="pagination-item">
                    <img src="./img/slide/slide1.jpg">   
                </label>

                <label for="2" class="pagination-item">
                    <img src="./img/slide/slide2.jpg">   
                </label>

                <label for="3" class="pagination-item">
                    <img src="./img/slide/slide3.jpg">   
                </label>

                <label for="4" class="pagination-item">
                    <img src="./img/slide/slide4.jpg">   
                </label>

                <label for="5" class="pagination-item">
                    <img src="./img/slide/slide5.jpg">   
                </label>

                <label for="6" class="pagination-item">
                    <img src="./img/slide/slide6.jpg">   
                </label>

            </div>
        </div>
        -->
</div>

<?php
// CONEXIÓN A LA BBDD
include "./capas/conexionBBDD.php";

// CONSULTA DE TODOS LOS DATOS DEL YACIMIENTO
$id_yacimiento = $_GET['y'];
$consulta = "SELECT
            y.nombre AS nombreYac,
            y.descripcion AS descripcionYac,
            m.nombre AS municipio,
            ir.nombre AS institucion,
            gc.grado_conservacion AS grado,
            ft.num_fotos AS numFotos
            FROM yacimientos y
            INNER JOIN municipios m ON y.municipio = m.id_municipio
            INNER JOIN instituciones_responsables ir ON y.institucion_responsable = ir.id_institucion
            INNER JOIN grado_conservacion gc ON y.grado_conservacion = gc.id_conservacion
            INNER JOIN fotos ft ON y.id_yacimiento = ft.yacimiento
            WHERE id_yacimiento = '$id_yacimiento'";

// ALMACENAR DATOS DEL YACIMIENTO EN ARRAY
$info_yacimiento = mysqli_query($conexion, $consulta);

while ($row = mysqli_fetch_array($info_yacimiento)) {

    // Asignar cada campo a una variable
    $nombre_yac_original = $row['nombreYac'];
    $nombre_yac = str_replace(" ", "", $row['nombreYac']);
    $descripcion = $row['descripcionYac'];
    $municipio = $row['municipio']; 
    $institucion = $row['institucion']; 
    $conservacion = $row['grado']; 
    $fotos = $row['numFotos'];
  
}

$consultaUbi = "SELECT ubicacion FROM ubicaciones WHERE yacimiento = '$id_yacimiento'";

// ALMACENAR DATOS DE LA UBICACION DEL YACIMIENTO EN ARRAY
$ubi_yacimiento = mysqli_query($conexion, $consultaUbi);

while ($row = mysqli_fetch_array($ubi_yacimiento)) {

    // Asignar cada campo a una variable
    $ubicacion = $row['ubicacion'];

}

$consultaFotos = "SELECT num_fotos FROM fotos WHERE yacimiento = '$id_yacimiento'";

// ALMACENAR EL NUMERO DE FOTOS DEL YACIMIENTO EN ARRAY
$fotos_yacimiento = mysqli_query($conexion, $consultaFotos);

while ($row = mysqli_fetch_array($fotos_yacimiento)) {

    // Asignar cada campo a una variable
    $num_fotos = $row['num_fotos'];
    
}

?>
<div class="yacimientoinfo">

    <div class="descripyacimiento">

        <!-- Muestra el título del yacimiento -->
        <p class="tituloyacimiento"><?php echo $nombre_yac_original ?></p> 
        
        <!-- Muestra los enlaces del yacimiento -->
        <div class="enlaces">

        <?php
            
            if($enlace_yac){
                echo "<a href='".$video."' class='enlaceyacimiento' target='_blank'>Youtube</a>"; // Muestra un enlace a Youtube si hay un vídeo disponible
            }
        ?>
    
        </div>

    </div> 
        
        <?php
        /* Muestra la información del yacimiento */
            echo "<div class='lineaInfoYac'>
            <p class='infoyacimiento'>
                ".$descripcion."
            </p> 
            </div>";
        
        // Muestra el grado de conservación
         "<p class='advertencia'>Grado de conservación:  ".$conservacion." </p>"; 

        /* Muestra los horarios y días de visita */
            echo "<p class='tituloyacimiento'>Horarios de visita</p>
                <ul class='horarios-lista'>";
        $consultaHorariosVisita = "SELECT 
                                    d.dia AS dia,
                                    ha.hora AS apertura,
                                    hc.hora AS cierre
                                FROM 
                                    horarios_de_visita hr
                                INNER JOIN 
                                    dias d ON hr.dia = d.id_dia
                                INNER JOIN 
                                    horas ha ON hr.apertura = ha.id_hora
                                INNER JOIN 
                                    horas hc ON hr.cierre = hc.id_hora
                                WHERE 
                                    hr.yacimiento = '$id_yacimiento'";

        // ALMACENAR LOS HORARIOS DE VISITA EN ARRAY
        $horariosDeVisita = mysqli_query($conexion, $consultaHorariosVisita);

        if ($horariosDeVisita) {
            // Comprobar si devuelve resultados
            if(mysqli_num_rows($horariosDeVisita) > 0){
            
                // Recorrer los resultados y mostrar los horarios de visita
                while ($row = mysqli_fetch_assoc($horariosDeVisita)) {
                    
                    // Asignar cada campo a una variable
                    $diaVisita = $row['dia'];
                    $horaAperturaVisita = date('H:i', strtotime($row['apertura'])); // Formatear la hora de apertura
                    $horaCierreVisita = date('H:i', strtotime($row['cierre'])); // Formatear la hora de cierre

                    // Mostrar el horario de visita en la lista
                    echo "<li>".$diaVisita.": <span>".$horaAperturaVisita." - ".$horaCierreVisita."</span></li>";
                }               
            }else{
                echo "<li>Visita libre</span></li>";
            }
            
        } else {
            // Manejar el caso de error en la consulta
            echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
        }
        echo "</ul>";
            
        ?>
        
        <?php
        /* Muestra las fotos del yacimiento */
        echo "<div class='galeria'>";
        
        for ($i = 1; $i < $num_fotos; $i++) 
            {
                echo "
                 <a href='#''>
                    <img src='./img/yacimientos/".$nombre_yac."/".$nombre_yac."_(".$i.").png' class='galeria_foto' alt='".$nombre_yac_original."'>
                 </a>"; 
            }

        echo "</div>";
        // Muestra un mensaje de advertencia en caso de que el yacimiento sea sensible a alteraciones
            if($ubicacion == ""){
                echo "<p class='advertencia'>".$nombre_yac_original." es muy sensible a alteraciones, por seguridad no se mostrará la ubicación.</p>"; // Muestra la ubicación del yacimiento si está disponible
            }else{
                 echo $ubicacion; // Muestra Google Maps si está disponible
            }
        ?>
        
        
</div>
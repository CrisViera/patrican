<?php

if(isset($_GET['q'])){

    $pagina = $_GET['q'];
    
    switch ($pagina) {
        case 'proyecto':
            $contenido = "./capas/sobreelproyecto.html";
            break;
        case 'municipios':
            $contenido = "municipios.php";
            break;
        case 'municipio':
            $contenido = "./capas/municipio.php";
            break;
        case 'yacimiento':
            $contenido = "./capas/yacimiento.php";
            break;
        case 'denuncia':
            $contenido = "denuncia.php";
            break;
        case 'contacto':
            $contenido = "contacto.php";
            break;
    }
}else{
    $contenido = "novedades.html";
}
?>

<div class="contenido">

<?php include $contenido; ?>

</div>
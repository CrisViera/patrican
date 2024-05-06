<?
    if(isset($_GET['q'])){

        $pagina = $_GET['q'];

        switch ($pagina) {
            case 'proyecto':
                $contenido = "proyecto.php";
                break;
            case 'municipios':
                $contenido = "municipios.php";
                break;
            case 'recursos':
                $contenido = "recursos.php";
                break;
            case 'contacto':
                $contenido = "contacto.php";
                break;
        }
    }else{
        $contenido = "inicio.php";
    }
?>
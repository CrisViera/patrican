
function ampliarImagen() {
  var imagen = document.getElementById('imgYacimiento');
      imagen.style.width = '90%';
}
function cerrarImg() {
    fullImgBox.style.top = "-150%";
}
function abrirmenu() {
    document.getElementsByClassName("menu").style.left = "0";
}

/* Esto comprueba la localStorage si ya tiene la variable guardada */
function compruebaAceptaCookies() {
    if(localStorage.aceptaCookies != 'true'){
      cajacookies.style.display = 'block';
    }
  }
  
  /* Aquí guardamos la variable de que se ha
  aceptado el uso de cookies así no mostraremos
  el mensaje de nuevo */
  function aceptarCookies() {
    localStorage.aceptaCookies = 'true';
    cajacookies.style.display = 'none';
  }
  
  /* Esto se ejecuta cuando la web está cargada */
  $(document).ready(function () {
    compruebaAceptaCookies();
  });
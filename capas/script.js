
function abrirImg(reference) {
    document.getElementById("fullImgBox").style.top = "0";
    document.getElementById("fullImg").src = reference;
}
function cerrarImg() {
    fullImgBox.style.top = "-150%";
}
function abrirmenu() {
    document.getElementsByClassName("menu").style.left = "0";
}

/* ésto comprueba la localStorage si ya tiene la variable guardada */
function compruebaAceptaCookies() {
    if(localStorage.aceptaCookies != 'true'){
      cajacookies.style.display = 'block';
    }
  }
  
  /* aquí guardamos la variable de que se ha
  aceptado el uso de cookies así no mostraremos
  el mensaje de nuevo */
  function aceptarCookies() {
    localStorage.aceptaCookies = 'true';
    cajacookies.style.display = 'none';
  }
  
  /* ésto se ejecuta cuando la web está cargada */
  $(document).ready(function () {
    compruebaAceptaCookies();
  });
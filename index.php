<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sensors</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="dennisstyle.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <h1> Sensors </h1>
        </div>
        </div>
        <div id="main">
          <h2>Sensor</h2>
        </div>
      </div>
     <div class="contenedor">
       <a href="graphs.php">
         <button class="my-button">Graph page</button>
       </a>
    </div>
</body>
</html>

<script>
// Utilizamos la funcion loadXMLDoc para realizar una solicitud a XMLHttpRequest

function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();

// Anyadimos la funcion onreadystatechange para que muestre si hay un cambio de solicitud
  xhttp.onreadystatechange = function() {

// Cuando el stado de la solicitud llega al 4 es que se ha hecho la solicitud la cual pasa por enviar, abrir, recibe el encabezdo, cargar i lista que es la 4

// El 200 para saber el stado el cual el codigo 200 como ya se de serveis es que es un ok
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("main").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "server.php", true);
  xhttp.send();
}
// Funcion de JS utilitzada para repetir las cosas en x tiempo
setInterval(function() {
// Y aqui usamos la siguiente funcion para indicar el tiempo de repeticion que es en milisegundos
  loadXMLDoc();
}, 2000);

// Window.onload es para que llame a la funciopm loadXMLDoc despues de que se haya cargado la pagina html/php que creamos
window.onload = loadXMLDoc;

</script>

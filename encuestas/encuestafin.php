<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/mini-nord.css">
    <title>Fin Encuesta</title>
</head>
<body>
<div class="container">
    <div class="row">
<div class="card"  style="margin: auto;">
<span>GRACIAS POR REALIZAR LA CONSULTA</span>
</div>
    </div>
</div>
<script>
setTimeout(function () {
   window.location.href= '/';
}, 2000);
</script>
</body>
</html>

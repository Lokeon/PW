<?php session_start();if (isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/bulma.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<nav>
  <a href="../admin/modificarpreguntasgenerales.php">Modificar Preguntas Generales</a><br>
  <a href="../admin/modificarpreguntas.php">Modificar Preguntas</a><br>
  <a href="../admin/borrarpreguntas.php">Borrar Preguntas</a><br>
  <a href="../admin/estadisticas.php">Ver Estadisticas</a><br>
  <a href="../login/logout.php?salir=1">Cerrar Sesión</a><br>
</nav>
</div>
</body>
</html>
<?php else:header("location:../login/login.php");endif; ?>
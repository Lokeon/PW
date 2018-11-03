<?php session_start();if (isset($_SESSION['user'])): ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/mini-nord.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<nav>
  <a href="../admin/modificarpreguntasgenerales.php">Modificar Preguntas Generales</a>
  <a href="../admin/modificarpreguntas.php">Modificar Preguntas</a>
  <a href="../admin/borrarpreguntasgenerales.php">Borrar Preguntas Generales</a>
  <a href="../admin/borrarpreguntas.php">Borrar Preguntas</a>
  <a href="../admin/estadisticas.php">Ver Estadisticas</a>
  <a href="../login/logout.php?salir=1">Cerrar Sesión</a>
</nav>
</div>
</body>
</html>
<?php else:header("location:../login/login.php");endif; ?>
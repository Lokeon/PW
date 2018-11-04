<?php

require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && !isset($_POST['atras'])) {
    if (isset($_POST['encuesta'])) {
        $_SESSION['encuesta'] = $_POST['encuesta'];
    }
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM PREGUNTAS WHERE id_preguntas IN(
            SELECT id_preguntas FROM TIPOENCUESTA WHERE id_tipoencuesta = :tipoen)";

        $pregs = getArrayQuery($conexion, $query, array(array(":tipoen"), array($_SESSION['encuesta'])))[0];
        if (empty($pregs)) {
            header("location:modificarpreguntas.php");
        }
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/bulma.min.css">
    <title>Modificar Preguntas</title>
</head>
<body>
<div class="container">
<form action="enviarpreg.php?index=<?php print($_SESSION['encuesta']); ?>" method="post">
<div class="field">
  <label class="label">Seleccione Pregunta</label>
  <div class="control">
    <div class="select">
      <select name="pregunta">
      <?php for ($j = 1; $j < count($pregs) && $pregs[$j] != ""; $j++) {
        print("<option value='$j'>$pregs[$j]</option>\n");
    } ?>
      </select>
    </div>
  </div>
</div>

<div class="field">
  <label class="label">Nueva pregunta</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea" name="nuevapreg" ></textarea>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" name="aceptar">Aceptar</button>
    <button class="button is-link" name="atras">Atras</button>
  </div>
</div>
</form>
</div>
</body>
</html>
<?php
} elseif (isset($_POST['atras'])) {
    header("location:admin.php");
} else {
    header("location:../login/login.php");
}
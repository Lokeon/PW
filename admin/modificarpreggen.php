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

        $query = "SELECT * FROM PREGUNTASGENERALES WHERE id_preguntasgenerales IN(
            SELECT id_preguntasgenerales FROM TIPOENCUESTA WHERE id_tipoencuesta = :tipoen)";

        $pregs = getArrayQuery($conexion, $query, array(array(":tipoen"), array($_SESSION['encuesta'])))[0];
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
    <title>Modificar Preguntas Generales</title>
</head>
<body>
<div class="container">
<form action="enviarpreggen.php?index=<?php print($_SESSION['encuesta']); ?>" method="post">
<div class="field">
  <label class="label">Seleccione Pregunta</label>
  <div class="control">
    <div class="select">
      <select name="pregunta">
      <?php for ($j = 1; $j < count($pregs); $j++) {
        if ($pregs[$j] != "") {

            print("<option value='$j'>$pregs[$j]</option>\n");
        }

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
<div class="field">
        <div class="control">
            <button class="button is-block is-info is-normal">Enviar</button>
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-block is-info is-normal" name="atras">Atras</button>
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
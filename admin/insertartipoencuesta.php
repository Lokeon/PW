<?php

require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query1 = "SELECT * FROM PREGUNTAS ";
        $query2 = "SELECT * FROM PREGUNTASGENERALES";
        $query3 = "SELECT * FROM OPCIONESPREGUNTAS";

        $pregs = getArrayQuery($conexion, $query1, array(array()));
        $pregsgen = getArrayQuery($conexion, $query2, array(array()));
        $opc = getArrayQuery($conexion, $query3, array(array()));
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
    <title>Insertar TipoEncuesta </title>
</head>
<body>
<div class="container">
<table class="hoverable">
  <thead>
    <tr>
      <th>Id Preguntas</th>
      <th>Preguntas</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($pregs); $i++) {
        print("<tr>");
        print("<td data-label=\"Id Preguntas\">{$pregs[$i][count($pregs[$i]) - 1]}</td>");
        print("<td data-label=\"Preguntas\">");
        print("<ol>");
        for ($j = 1; $j < count($pregs[$i]) - 1; $j++) {
            if ($pregs[$i][$j] != "") {
                print("<li>{$pregs[$i][$j]}</li>");
            }
        }
        print("</ol></td></tr>");
    } ?>
  </tbody>
</table>
<table class="hoverable">
  <thead>
    <tr>
      <th>Id Opciones</th>
      <th>Opciones</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($opc); $i++) {
        print("<tr>");
        print("<td data-label=\"Id Opciones\">{$opc[$i][count($opc[$i]) - 1]}</td>");
        print("<td data-label=\"Opciones\">");
        print("<ol>");
        for ($j = 1; $j < count($opc[$i]) - 1; $j++) {
            if ($opc[$i][$j] != "") {
                print("<li>{$opc[$i][$j]}</li>");
            }
        }
        print("</ol></td></tr>");
    } ?>
  </tbody>
</table>
<table class="hoverable">
  <thead>
    <tr>
      <th>Id Preguntas Generales</th>
      <th>Preguntas Generales</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 0; $i < count($pregsgen); $i++) {
        print("<tr>");
        print("<td data-label=\"Id Preguntas Generales\">{$pregsgen[$i][count($pregsgen[$i]) - 1]}</td>");
        print("<td data-label=\"Preguntas\">");
        print("<ol>");
        for ($j = 1; $j < count($pregsgen[$i]) - 1; $j++) {
            if ($pregsgen[$i][$j] != "") {
                print("<li>{$pregsgen[$i][$j]}</li>");
            }
        }
        print("</ol></td></tr>");
    } ?>
  </tbody>
</table>
<form action="inserttipo.php" method="post">
<div class="field">
  <label class="label">Introduzca Id Preguntas , Id Preguntas Genereales y Id Opciones  </label>
</div>
<?php for ($i = 1; $i < 4; $i++): ?>
<div class="control">
<label>Id <?PHP print($i); ?></label>
<input type="text" class="input is-primary" name='<?PHP printf("id%d", $i); ?>'></textarea>
</div>
<?PHP endfor; ?>
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
} else {
    header("location:../login/login.php");
}
?>


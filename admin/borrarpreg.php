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
            header("location:borrarpreguntas.php");
        }
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
    $title = "Modificar Preguntas";include "../template/head.php"
    ?>
<body>
<div class="container">
<form action="enviarbopreg.php?index=<?PHP print($_SESSION['encuesta']); ?>" method="post">
<input type="hidden" name="reps" value="<?PHP print($pregs[0]) ?>"/>
<div class="field">
  <label class="label">Seleccione Pregunta</label>
  <div class="control">
    <div class="select">
      <select name="pregunta">
      <?php for ($j = 1; $j < count($pregs); $j++) {
        if ($pregs[$j] != "") {
            print("<option value='$j-$pregs[$j]'>$pregs[$j]</option>\n");
        }
    } ?>
      </select>
    </div>
  </div>
</div>
<div class="field is-grouped">
  <div class="control">
    <button class="button is-link" name="atras">Atras</button>
    <button class="button is-link" name="aceptar">Enviar</button>
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
?>
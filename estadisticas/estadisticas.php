<?php
session_start();
if (isset($_POST['ciudad'])) {
    $_SESSION['encuesta'] = $_POST['ciudad'];
}
if (isset($_SESSION['encuesta'])) {
    $db = include "../config/db.php";
    $queries = include "./filtros.php";
    require "./funciones.php";
    $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $preguntas = getQueryArray($conexion, $queries['encuesta'], array(array(":tipoen"), array($_SESSION['encuesta'])))[0];
    $values = valuesFiltros();
    $opciones = opcionesFiltros();
    if (isset($_POST['filtro'])) {
        $post = comprobarPOST();
        if (count($post) > 0) {
            $respuestas = respuestas(getQueryArray($conexion, filtrosQuery($post, $queries['general']), array(array())));
        } else {
            switch ($_POST['filtro']) {
                case 'Sin filtro':
                    $respuestas = respuestas(getQueryArray($conexion, $queries['sinfiltro'], array(array())));
                    break;
                case 'Sexo':
                    $respuestas = respuestas(getQueryArray($conexion, $queries['sexo'], array(array(":sexo"), array("Mujer"))));
                    break;
                case 'Edad':
                    $respuestas = respuestas(getQueryArray($conexion, $queries['edad'], array(array())));
                    break;
            }
        }
    }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadisticas</title>
    <link rel="stylesheet" href="../static/bulma.min.css">
</head>

<body>
<section class="hero is-fullheight is-default is-bold">
<div class="hero-body">
    <div class="container has-text-centered">
        <div class="columns">
            <div class="column is-3">
                <h2>Filtros</h2>
            <form action="estadisticas.php" method="post">
                <p class="control">
                    <input type="submit" class="button is-primary" value="Sin filtro" name="filtro" />
                </p>
                <?php for ($i = 1; $i < count($preguntas); $i++): ?>
                <div class="field">
                    <label class="label"><?php print($preguntas[$i]); ?></label>
                    <div class="control">
                        <div class="select">
                          <select name="<?php print($values[$i]); ?>">
                          <option disabled selected value> Seleccione una opción </option>
                          <?php for ($j = 0; $j < count($opciones[$i]); $j++): ?>
                            <?php if ($i == 2) {
        printf("<option value=\"'%s'\">%s</option>", $opciones[$i][$j], $opciones[$i][$j]);
    } else {
        printf("<option value='%d'>%s</option>", $j + 1, $opciones[$i][$j]);} ?>
                            <?php endfor; ?>
                          </select>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </form>
            </div>
            <div class="column is-9">
                <div class="columns is-multiline">
                <?php if (isset($_POST['filtro'])) {include "graficas.php";} ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
    <script src="../static/Chart.bundle.min.js"></script>
    <?php if (isset($_POST['filtro'])) {include "scripts.php";} ?>
</body>

</html>
<?php
} else {
    header("location:estudio.php");
}
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
        if (!empty($post[0]) && !empty($post[1])) {
            $respuestas = respuestas(getQueryArray($conexion, filtrosQuery($post, $queries['general']), array(array())));
        } else {
            $respuestas = respuestas(getQueryArray($conexion, $queries['sinfiltro'], array(array())));
        }
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadísticas</title>
    <link rel="stylesheet" href="../static/bulma.min.css">
</head>

<body>
<section class="hero is-fullheight is-default is-bold">
<div class="hero-body">
    <div class="container">
        <div class="columns">
            <div class="column is-3">
                <div class="card">
                    <div class="card-content">
                    <p class="title">Filtros</p>
                    <p class="subtitle">Seleccione los filtos deseados.</p>
                    <form action="estadisticas.php" method="post">
                    <p class="control has-text-centered">
                        <input type="submit" class="button is-link" value="Aplicar" name="filtro" />
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
                </div>
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
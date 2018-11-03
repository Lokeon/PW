<?php
$db = include "../config/db.php";
try {
    session_start();
    $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_SESSION['tipoencuesta'])) {
        $query = "SELECT nombre FROM PROFESOR ";
        $resultado = $conexion->prepare($query);
        $resultado->execute();
        $prof = $resultado->fetchAll(\PDO::FETCH_NUM);
        $query = "SELECT nombre FROM ASIGNATURA";
        $resultado = $conexion->prepare($query);
        $resultado->execute();
        $asig = $resultado->fetchAll(\PDO::FETCH_NUM);
    } else {
        $query = "SELECT ciudad FROM ESTUDIO";
        $resultado = $conexion->prepare($query);
        $resultado->execute();
        $ciudades = $resultado->fetchAll(\PDO::FETCH_NUM);
    }
} catch (Exception $e) {
    exit("Error: " . $e->getMessage());
}
?>
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
        <div class="row">
            <div class="card" style="margin: auto;">
                <?php if (isset($_SESSION['tipoencuesta'])) { ?>
                <form action="#" method="post">
                    <fieldset>
                        <legend>Seleccione Encuesta</legend>
                        <div class="input-group">
                            <label for="profesor">Profesor</label>
                            <select id="profesor" style="width:100%;" name="profesor">
                                <?php foreach ($prof as $p) {print("<option>" . $p[0] . "</option>\n");} ?>
                            </select>
                            <label for="asignatura">Asignatura</label>
                            <select id="asignatura" style="width:100%;" name="asignatura">
                                <?php foreach ($asig as $a) {print("<option>" . $a[0] . "</option>\n");} ?>
                            </select>
                            <input type="submit" value="Empezar" class="primary rounded" name="empezar" />
                            <input type="submit" value="Atras" class="primary rounded" name="atras" />
                        </div>
                    </fieldset>
                </form>
                <?php if (isset($_GET['error'])): ?>
                <div class="card error">
                    <p><span class="icon-alert"></span>
                        <?php print($_GET['error']) ?>
                    </p>
                </div>
                <?php endif; ?>
                <?php } else { ?>
                <form action="#" method="post">
                    <fieldset>
                        <legend>Seleccione Ciudad</legend>
                        <div class="input-group">
                            <label for="ciudad">Ciudad</label>
                            <select id="ciudad" style="width:100%;" name="ciudad">
                                <?php foreach ($ciudades as $c) {print("<option>" . $c[0] . "</option>\n");} ?>
                            </select>
                            <input type="submit" value="Empezar" class="primary rounded" name="encuesta" />
                        </div>
                    </fieldset>
                </form>
                <?php if (isset($_GET['error'])): ?>
                <div class="card warning">
                    <p><span class="icon-alert"></span>
                        <?php print($_GET['error']) ?>
                    </p>
                </div>
                <?php endif; ?>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if (isset($_POST['atras'])) {
    session_destroy();
    header("location:encuestas.php");
} elseif (isset($_POST['empezar'])) {
    try {
        $query = "SELECT * FROM IMPARTE WHERE id_profesor=(SELECT id_profesor FROM PROFESOR WHERE nombre= :prof ) AND id_asignatura=(SELECT id_asignatura FROM ASIGNATURA WHERE nombre= :asig)";
        $resultado = $conexion->prepare($query);
        $prof = $_POST['profesor'];
        $asig = $_POST['asignatura'];
        $resultado->bindValue(":prof", $prof);
        $resultado->bindValue(":asig", $asig);
        $resultado->execute();
        if ($resultado->rowCount() != 0) {
            $_SESSION['imparte'] = $resultado->fetchAll(\PDO::FETCH_NUM)[0][0];
            header("location:encuestar.php");
        } else {
            header("location:encuestas.php?error=El profesor " . $prof . " no imparte " . $asig);
        }
    } catch (Exception $e) {
        exit("Error: " . $e->getMessage());
    }
} elseif (isset($_POST['encuesta'])) {
    $query = "SELECT id_tipoencuesta FROM ESTUDIO WHERE ciudad= :ciud ";
    $resultado = $conexion->prepare($query);
    $ciudad = $_POST['ciudad'];
    $resultado->bindValue(":ciud", $ciudad);
    $resultado->execute();
    if ($resultado->rowCount() != 0) {
        $_SESSION['tipoencuesta'] = $resultado->fetchAll(\PDO::FETCH_NUM)[0][0];
        header("location:encuestas.php");
    } else {
        header("location:encuestas.php?error=No existen encuestas para " . $ciudad);
    }
}
?>
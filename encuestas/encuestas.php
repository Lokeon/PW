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
        <link rel="stylesheet" href="../static/bulma.min.css">
        <title>Selección de Encuesta</title>
    </head>

    <body>
        <div calss="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <?php if (isset($_SESSION['tipoencuesta'])) { ?>
                    <form action="#" method="post">
                        <div class="box">
                            <h3 class="title has-text-centered has-text-grey">Seleccione Encuesta</h3>
                                <div class="field">
                                    <label class="label">Profesor</label>
                                    <div class="control has-text-centered">
                                        <div class="select">
                                            <select id="profesor" name="profesor">
                                                <?php foreach ($prof as $p) {print("<option>" . $p[0] . "</option>\n");} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label class="label">Asignatura</label>
                                    <div class="control has-text-centered">
                                        <div class="select">
                                            <select id="asignatura" name="asignatura">
                                                <?php foreach ($asig as $a) {print("<option>" . $a[0] . "</option>\n");} ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <input type="submit" value="Atras" class="button is-link" name="atras" />
                                    <input type="submit" value="Empezar" class="button is-link" name="empezar" />
                                </div>
                        </div>
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
                        <div class="box">
                            <h3 class="title has-text-centered has-text-grey">Seleccione Ciudad</h3>
                                <div class="field">
                                    <label class="label">Ciudad</label>
                                    <div class="control has-text-centered">
                                        <div class="select">
                                            <select id="ciudad" name="ciudad">
                                                <?php foreach ($ciudades as $c) {print("<option>" . $c[0] . "</option>\n");} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <a class="button is-link" href="../index.php"><b>Atras</b></a>
                                <input type="submit" value="Siguiente" class="button is-link" name="encuesta"/>
                        </div>
                    </form>
                        <?php if (isset($_GET['error'])): ?>
                        <div class="card warning">
                            <p>
                                <span class="icon-alert"></span>
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
<?php
require "funciones.php";
$db = include "../config/db.php";
session_start();
if (isset($_SESSION['user'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT PREGUNTAS.*, TIPOENCUESTA.id_tipoencuesta FROM PREGUNTAS INNER JOIN TIPOENCUESTA ON PREGUNTAS.id_preguntas = TIPOENCUESTA.id_preguntas";
        $tipos = getArrayQuery($conexion, $query, array(array()));
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
    <div class="hero-body">
        <div class="container">
            <table class="hoverable">
                <h2 class="title">Modificar Preguntas</h2>
            <thead>
                <tr>
                <th>Tipo De Encuesta</th>
                <th>Preguntas</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($tipos); $i++) {
        print("<tr>");
        print("<td data-label=\"Tipo Encuesta\">{$tipos[$i][count($tipos[$i]) - 1]}</td>");
        print("<td data-label=\"Preguntas\">");
        print("<ol>");
        for ($j = 1; $j < count($tipos[$i]) - 1; $j++) {
            if ($tipos[$i][$j] != "") {
                print("<li>{$tipos[$i][$j]}</li>");
            }
        }
        print("</ol></td></tr>");
    } ?>
            </tbody>
            </table>
        <form action="modificarpreg.php" method="post">
            <div class="field">
                <div class="control">
                    <input class="input is-normal" type="text" placeholder="Ingrese Tipo Encuesta" autofocus="" name="encuesta">
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
    </div>
</body>
</html>
<?php
} else {
    header("location:../login/login.php");
}
?>


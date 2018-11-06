<?php

require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT PREGUNTASGENERALES.*, TIPOENCUESTA.id_tipoencuesta
        FROM PREGUNTASGENERALES INNER JOIN TIPOENCUESTA
        ON PREGUNTASGENERALES.id_preguntasgenerales = TIPOENCUESTA.id_preguntasgenerales";
        $tipos = getArrayQuery($conexion, $query, array(array()));
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
    $title = "Modificar Preguntas Personales";include "../template/head.php"
    ?>
<body>
    <div class="hero-body">
        <div class="container">
            <table class="hoverable">
                <h2 class="title">Modificar Preguntas Personales</h2>
                <thead>
                    <tr>
                        <th>Tipo De Encuesta</th>
                        <th>Preguntas Generales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($tipos); $i++) {
        print("<tr>");
        print("<td data-label=\"Tipo Encuesta\">{$tipos[$i][count($tipos[$i]) - 1]}</td>");
        print("<td data-label=\"Preguntas Generales\">");
        print("<ol>");
        for ($j = 1; $j < count($tipos[$i]) - 1 && $tipos[$i][$j] != ""; $j++) {
            print("<li>{$tipos[$i][$j]}</li>");
        }
        print("</ol></td></tr>");
    } ?>
                </tbody>
            </table>
            <form action="modificarpreggen.php" method="post">
                <div class="field">
                    <div class="control">
                        <input class="input is-normal" type="text" placeholder="Ingrese Tipo Encuesta" autofocus="" name="encuesta">
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" name="atras">Atras</button>
                        <button class="button is-link">Enviar</button>
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


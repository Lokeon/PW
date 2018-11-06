<?php
require "funciones.php";
$db = include "../config/db.php";
session_start();
if (isset($_SESSION['user'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query1 = "SELECT id_tipoencuesta,id_preguntas FROM TIPOENCUESTA";
        $tipos = getArrayQuery($conexion, $query1, array(array()));

    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
    $title = "Insertar Estudio";include "../template/head.php"
    ?>
<body>
    <div class="hero-body">
        <div class="container">
            <table class="hoverable">
                <thead>
                    <tr>
                        <th>Id Tipo Encuesta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($tipos); $i++) {
        print("<tr>");
        print("<td data-label=\"Id TipoEncuesta\">{$tipos[$i][0]}</td>");
        print("<td data-label=\"Id Preguntas\">");
        print("<ol>");
        for ($j = 1; $j < count($tipos[$i]); $j++) {
            if ($tipos[$i][$j] != "") {
                print("<li>{$tipos[$i][$j]}</li>");
            }
        }
        print("</ol></td></tr>");
    }
    ?>
                </tbody>
            </table>
            <form action="insertarest.php" method="post">
                <div class="field">
                    <br>
                    <label class="label">Introduzca Id TipoEncuesta , Fecha y Ciudad  </label>
                </div>
                <div class="control">
                    <label>Id TipoEncuesta</label>
                    <input type="text" class="input is-normal" name='tipo'></textarea>
                    <label>Fecha</label>
                    <input type="date" class="input is-normal" name='date'>
                    <label>Ciudad</label>
                    <input type="text" class="input is-normal" name='city'></textarea>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <br>
                        <button class="button is-link" name="atras">Atras</button>
                        <button class="button is-link" name="aceptar">Aceptar</button>
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

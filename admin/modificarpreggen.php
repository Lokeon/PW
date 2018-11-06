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
    $title = "Modificar Preguntas Generales";include "../template/head.php"
    ?>
<body>
    <div class="container">
        <div class="hero-body">
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
} elseif (isset($_POST['atras'])) {
    header("location:admin.php");
} else {
    header("location:../login/login.php");
}
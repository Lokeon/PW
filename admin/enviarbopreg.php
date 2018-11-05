<?PHP
require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && isset($_POST['pregunta']) && !empty(($_POST['pregunta']))) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $opc = explode('-', $_POST['pregunta']);

        print($_POST['reps']);

        $query = "UPDATE PREGUNTAS SET pregunta" . $opc[0] . " = '' WHERE id_preguntas
        IN(SELECT id_tipoencuesta FROM TIPOENCUESTA WHERE id_tipoencuesta = '{$_SESSION['encuesta']}')";

        setArrayUpdate($conexion, $query, array(array()));

        $query = "UPDATE RESPUESTAS SET id_pregunta" . $opc[0] . " = 6 WHERE id_respuestas
        IN (SELECT id_respuestas FROM ENCUESTA WHERE id_tipoencuesta IN(SELECT id_tipoencuesta
        FROM TIPOENCUESTA WHERE id_tipoencuesta = '{$_SESSION['encuesta']}' and id_preguntas ='{$_POST['reps']}'))";

        setArrayUpdate($conexion, $query, array(array()));

        header("location:borrarpreg.php");
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
} elseif (isset($_POST['atras'])) {
    unset($_SESSION['encuesta']);
    header("location:borrarpreguntas.php");
} else {
    header("location:../login/login.php");
}

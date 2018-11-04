<?PHP
require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && isset($_POST['nuevapreg']) && !empty($_POST['nuevapreg'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE PREGUNTAS SET pregunta" . $_POST['pregunta'] . " = '{$_POST['nuevapreg']}'
                  WHERE id_preguntas IN(SELECT id_preguntas FROM TIPOENCUESTA
                  WHERE id_tipoencuesta = '{$_SESSION['encuesta']}' )";
        setArrayUpdate($conexion, $query, array(array()));
        header("location:modificarpreg.php");
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
} elseif (isset($_POST['atras'])) {
    unset($_SESSION['encuesta']);
    header("location:modificarpreguntas.php");
} else {
    header("location:../login/login.php");
}

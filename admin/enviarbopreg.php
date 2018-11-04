<?PHP
require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && isset($_POST['pregunta'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $opc = explode('-', $_POST['pregunta']);

        $query = "UPDATE PREGUNTAS SET pregunta" . $opc[0] . " = '' WHERE pregunta" . $opc[0] . " = '{$opc[1]}'";

        /* Nombre-Sexo-Dia-Mes-Año
        Nombre--Dia-Mes-Año

        1.- Nombre
        NS 1 2 3 4 5
        2.-
        NS 1 2 3 4 5
        3.- Dia
        NS 1 2 3 4 5
        4.- Año
        NS 1 2 3 4 5
         */

        setArrayUpdate($conexion, $query, array(array()));
        header("location:borrarpreguntas.php");
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
} elseif (isset($_POST['atras'])) {
    unset($_SESSION['encuesta']);
    header("location:modificarpreguntas.php");
} else {
    header("location:../login/login.php");
}

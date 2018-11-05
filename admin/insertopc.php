<?PHP
require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && !isset($_POST['atras'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO OPCIONESPREGUNTAS (";
        $qaux = "opcion6) VALUES (";
        for ($i = 1; $i < 6; $i++) {
            $query .= "opcion$i,";
            $qaux .= ":r$i,";
        }
        $query .= $qaux . ":r$i)";

        $resultado = $conexion->prepare($query);
        for ($i = 1; $i < count($_POST); $i++) {
            $resultado->bindValue(":r$i", $_POST["opcs$i"]);
        }
        $resultado->execute();

        header("Location:finopc.php");

    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }

} else {
    header("Location:admin.php");
}

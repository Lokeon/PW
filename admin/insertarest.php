<?PHP
require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && !isset($_POST['atras'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO ESTUDIO(id_tipoencuesta,fecha,ciudad)
        VALUES (:tipoen,:fe,:ci)";

        $resultado = $conexion->prepare($query);
        $resultado->bindValue(":tipoen", $_POST['tipo']);
        $resultado->bindValue(":fe", $_POST['date']);
        $resultado->bindValue(":ci", $_POST['city']);
        $resultado->execute();

        header("Location:fininsertest.php");

    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }

} else {
    header("Location:admin.php");
}

<?PHP
require "funciones.php";
$db = include "../config/db.php";

session_start();
if (isset($_SESSION['user']) && !isset($_POST['atras'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO TIPOENCUESTA(id_preguntas,id_preguntasgenerales,id_opcionespreguntas)
                  VALUES(:r1,:r2,:r3)";
        $resultado = $conexion->prepare($query);
        for ($i = 1; $i < 4; $i++) {
            $resultado->bindValue(":r$i", $_POST["id$i"]);
        }
        $resultado->execute();

        header("Location:fininserttipo.php");

    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }

} else {
    header("Location:admin.php");
}

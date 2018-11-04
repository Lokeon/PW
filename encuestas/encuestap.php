<?PHP

$db = include "../config/db.php";

session_start();

if (isset($_SESSION['tipoencuesta'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM PREGUNTAS WHERE id_preguntas IN(SELECT id_preguntas FROM TIPOENCUESTA WHERE id_tipoencuesta= :tipoen)";
        $resultado = $conexion->prepare($query);
        $tipoen = $_SESSION['tipoencuesta'];
        $resultado->bindValue(":tipoen", $tipoen);
        $resultado->execute();
        $pregs = $resultado->fetchAll(\PDO::FETCH_NUM)[0];
        $query = "SELECT * FROM OPCIONESPREGUNTAS WHERE id_opcionespreguntas IN(SELECT id_opcionespreguntas FROM TIPOENCUESTA WHERE id_tipoencuesta= :tipoen)";
        $resultado = $conexion->prepare($query);
        $resultado->bindValue(":tipoen", $tipoen);
        $resultado->execute();
        $opc = $resultado->fetchAll(\PDO::FETCH_NUM)[0];
    } catch (Exception $e) {
        exit("Error: " . $e->getMessage());
    }
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../static/mini-nord.css">
    <title>Encuesta-Preguntas</title>
</head>
<body>
<div class="container">
    <div class="row">
                <form action="validateencuestap.php" method="post" style="margin: auto;">
                    <fieldset>
                        <legend><h2>Informacion personal y acádemica</h2></legend>
                        <div class="input-group">
<?php
for ($i = 1; $i < count($pregs); ++$i) {
        print("<div class=\"col-sm-12\">\n<h4> $pregs[$i] </h4>");
        for ($j = 1; $j < count($opc); ++$j) {
            print("<label><INPUT TYPE='radio' NAME='radio$i' VALUE='" . ($j - 1) . "'>$opc[$j]</label>");
        }
        print("</div>");
    }
    print("<input type='submit' name='Enviar' value='Enviar' class='rounded primary' />");
    ?>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
  </body>
</html>

<?PHP
} else {
    header("Location:encuestas.php");
}

?>
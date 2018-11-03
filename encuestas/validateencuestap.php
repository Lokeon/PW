<?php
session_start();
if (isset($_SESSION['tipoencuesta'])) {
    $db = include "../config/db.php";
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        exit("Error: " . $e->getMessage());
    }
    if (isset($_POST['Enviar'])) {
        $checked = false;
        for ($i = 1; $i < 24 && !$checked; $i++) {
            if (!isset($_POST["radio$i"])) {
                $checked = true;
            }
        }
        if (!$checked) {
            $query = "INSERT INTO RESPUESTAS (";
            $qaux = "id_pregunta23) VALUES (";
            for ($i = 1; $i < 23; $i++) {
                $query .= "id_pregunta$i,";
                $qaux .= ":r$i,";
            }
            $query .= $qaux . ":r$i)";

            $resultado = $conexion->prepare($query);
            for ($i = 1; $i < count($_POST); $i++) {
                $resultado->bindValue(":r$i", $_POST["radio$i"]);
            }
            $resultado->execute();

            $query1 = "INSERT INTO ENCUESTA (id_tipoencuesta,id_imparte,id_respuestas,id_respuestasgenerales) VALUES (:tipoen,:impa,(SELECT Max(id_respuestas) FROM RESPUESTAS),(SELECT Max(id_respuestasgenerales) FROM RESPUESTASGENERALES))";

            $resultado = $conexion->prepare($query1);
            $resultado->bindvalue(":tipoen", $_SESSION['tipoencuesta']);
            $resultado->bindvalue(":impa", $_SESSION['imparte']);
            $resultado->execute();

            header("location:encuestafin.php");

        } else {
            header("location:encuestap.php");
        }
    }
} else {
    header("location:encuestas.php");
}

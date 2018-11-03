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
    if (isset($_POST['siguiente'])) {
        $checked = false;
        for ($i = 1; $i < 12 && !$checked; $i++) {
            if (!isset($_POST["radio$i"])) {
                $checked = true;
            }
        }
        if (!$checked) {
            $query = "INSERT INTO RESPUESTASGENERALES (edad, sexo, cursomasalto, cursomasbajo,
            vecesmatricula, vecesconvocatorias, interesasig, usotutorias, dificultadasig, calificacionesperada, asistenciaclase)
            VALUES (:r1, :r2, :r3, :r4, :r5, :r6, :r7, :r8, :r9, :r10, :r11)";
            $resultado = $conexion->prepare($query);
            for ($i = 1; $i < 12; $i++) {
                $resultado->bindValue(":r$i", $_POST["radio$i"]);
            }
            $resultado->execute();
            header("location:encuestap.php");
        } else {
            header("location:encuestar.php");
        }
    }
} else {
    header("location:encuestas.php");
}

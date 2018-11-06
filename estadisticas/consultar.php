<?php
session_start();
$db = include "../config/db.php";
$queries = include "./filtros.php";
require "./funciones.php";
$conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['consultar']) && !isset($_SESSION['profesor'])) {
    try {
        $query = "SELECT * FROM IMPARTE WHERE id_profesor= :prof AND id_asignatura= :asig";
        $resultado = $conexion->prepare($query);
        $prof = $_POST['profesor'];
        $asig = $_POST['asignatura'];
        $resultado->bindValue(":prof", $prof);
        $resultado->bindValue(":asig", $asig);
        $resultado->execute();
        if ($resultado->rowCount() != 0) {
            $_SESSION['profesor'] = $prof;
            $_SESSION['asignatura'] = $asig;
            header("location:estadisticas.php");
        } else {
            header("location:estudio.php?error=El profesor elegido no imparte la asignatura");
        }
    } catch (Exception $e) {
        exit("Error: " . $e->getMessage());
    }
} elseif (isset($_POST['atras'])) {
    session_destroy();
    header("location:estudio.php");
}

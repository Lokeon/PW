<?php
session_start();

$db = include "../config/db.php";

try {

    if (!empty($_POST['user']) && !empty($_POST['pass'])) {
        $base = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM USERPASS WHERE USER= :user AND PASS= :pass";
        $rslt = $base->prepare($query);
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rslt->bindValue(":user", $user);
        $rslt->bindValue(":pass", $pass);
        $rslt->execute();
        if ($rslt->rowCount() != 0) {
            $_SESSION['user'] = $user;
            header("location:../admin/admin.php");
        } else {
            header("location:login.php?error=usuario y/o contraseña incorrectos.");
        }
    } else {
        header("location:login.php?warning=usuario y/o contraseña vacios.");
    }
} catch (Exception $e) {
    exit("Error: " . $e->getMessage());
}

<?php
session_start();
if (isset($_GET['salir'])) {
    session_destroy();
    header("location:login.php");
}

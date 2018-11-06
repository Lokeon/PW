<?php
session_start();
if (isset($_POST['encuesta'])) {
    $_SESSION['encuesta'] = $_POST['ciudad'];
    header("location:estudio.php");
}

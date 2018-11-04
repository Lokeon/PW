<?php
$db = include "../config/db.php";
function db()
{
    static $conn;
    if ($conn == null) {
        $conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
    }
    return $conn;
}

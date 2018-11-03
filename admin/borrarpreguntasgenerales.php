
<?PHP
$db = include "../config/db.php";
try {
    $base = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT nombre FROM PROFESOR ";
    $rslt = $base->prepare($query);
    $rslt->execute();
    $prof = $rslt->fetchAll(\PDO::FETCH_NUM);
    $query = "SELECT nombre FROM ASIGNATURA";
    $rslt = $base->prepare($query);
    $rslt->execute();
    $asig = $rslt->fetchAll(\PDO::FETCH_NUM);
} catch (Exception $e) {
    exit("Error: " . $e->getMessage());
}

?>

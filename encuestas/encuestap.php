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
    $title = "Preguntas";include "../template/head.php"
    ?>
<body>
    <div class="container">
        <div class="hero-body">
            <div class="columns">
                <form action="validateencuestap.php" method="post">
                    <h2 class="title">Informacion personal y acádemica</h2>
                    <div class="input-group">
<?php for ($i = 1; $i < count($pregs); ++$i) {
        if ($pregs[$i] != '') {
            print("<div class=\"control\">");
            print("<label class=\"label\"><b>$pregs[$i]</b></label>");

            for ($j = 1; $j < count($opc); ++$j) {
                print("<label class=\"radio\"><INPUT TYPE='radio' NAME='radio$i' VALUE='" . ($j - 1) . "'>$opc[$j]</label>");
            }
            print("</div>");
            print("<br>");
        } else {
            print("<label><INPUT TYPE='hidden' NAME='radio$i' VALUE='0'></label>"); /*CAMBIAR EL VALUE PARA QUE NO CAMBIA LAS ENCUESTA*/
        }
    }
    print("<input type='submit' name='Enviar' value='Enviar' class='button is-link' />");
    ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?PHP
} else {
    header("Location:encuestas.php");
}

?>
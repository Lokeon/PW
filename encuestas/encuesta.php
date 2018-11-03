<?PHP
$db = include "../config/db.php";
session_start();
if (isset($_SESSION['tipoencuesta'])) {
    try {
        $conexion = new PDO("mysql:host=" . $db['host'] . "; dbname=" . $db['name'], $db['user'], $db['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "SELECT * FROM PREGUNTASGENERALES WHERE id_preguntasgenerales IN(SELECT id_preguntasgenerales FROM TIPOENCUESTA WHERE id_tipoencuesta= :tipoen)";
        $resultado = $conexion->prepare($query);
        $tipoen = $_SESSION['tipoencuesta'];
        $resultado->bindValue(":tipoen", $tipoen);
        $resultado->execute();
        $preg = $resultado->fetchAll(\PDO::FETCH_NUM)[0];
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
        <title>Encuesta</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <form action="#" method="post" style="margin: auto;">
                    <fieldset>
                        <legend><h2>Informacion personal y acádemica</h2></legend>
                        <div class="input-group">
                            <div class="row">
                            <h4><?PHP print($preg[1]); ?></h4>
                            <label><input type="radio" name="radio1" value="1"> &#8804; 19</label>
                            <label><input type="radio" name="radio1" value="2"> 20 - 21</label>
                            <label><input type="radio" name="radio1" value="3"> 22 - 23</label>
                            <label><input type="radio" name="radio1" value="4"> 24 - 25</label>
                            <label><input type="radio" name="radio1" value="5"> &gt; 25</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[2]); ?></h4>
                            <label><input type="radio" name="radio2" value="Hombre">Hombre</label>
                            <label><input type="radio" name="radio2" value="Mujer">Mujer</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[3]); ?></h4>
                            <label><input type="radio" name="radio3" value="1">1º</label>
                            <label><input type="radio" name="radio3" value="2">2º</label>
                            <label><input type="radio" name="radio3" value="3">3º</label>
                            <label><input type="radio" name="radio3" value="4">4º</label>
                            <label><input type="radio" name="radio3" value="5">5º</label>
                            <label><input type="radio" name="radio3" value="6">6º</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[4]); ?></h4>
                            <label><input type="radio" name="radio4" value="1">1º</label>
                            <label><input type="radio" name="radio4" value="2">2º</label>
                            <label><input type="radio" name="radio4" value="3">3º</label>
                            <label><input type="radio" name="radio4" value="4">4º</label>
                            <label><input type="radio" name="radio4" value="5">5º</label>
                            <label><input type="radio" name="radio4" value="6">6º</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[5]); ?></h4>
                            <label><input type="radio" name="radio5" value="1">1</label>
                            <label><input type="radio" name="radio5" value="2">2</label>
                            <label><input type="radio" name="radio5" value="3">3</label>
                            <label><input type="radio" name="radio5" value="4">&gt; 3</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[6]); ?></h4>
                            <label><input type="radio" name="radio6" value="1">1</label>
                            <label><input type="radio" name="radio6" value="2">2</label>
                            <label><input type="radio" name="radio6" value="3">3</label>
                            <label><input type="radio" name="radio6" value="4">&gt; 3</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[7]);?></h4>
                            <label><input type="radio" name="radio7" value="1">Nada</label>
                            <label><input type="radio" name="radio7" value="2">Algo</label>
                            <label><input type="radio" name="radio7" value="3">Bastante</label>
                            <label><input type="radio" name="radio7" value="4">Mucho</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[8]); ?></h4>
                            <label><input type="radio" name="radio8" value="1">Nada</label>
                            <label><input type="radio" name="radio8" value="2">Algo</label>
                            <label><input type="radio" name="radio8" value="3">Bastante</label>
                            <label><input type="radio" name="radio8" value="4">Mucho</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[9]); ?></h4>
                            <label><input type="radio" name="radio9" value="1">Baja</label>
                            <label><input type="radio" name="radio9" value="2">Media</label>
                            <label><input type="radio" name="radio9" value="3">Alta</label>
                            <label><input type="radio" name="radio9" value="4">Muy Alta</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[10]); ?></h4>
                            <label><input type="radio" name="radio10" value="1">N.P</label>
                            <label><input type="radio" name="radio10" value="2">Sus.</label>
                            <label><input type="radio" name="radio10" value="3">Apro.</label>
                            <label><input type="radio" name="radio10" value="4">Not.</label>
                            <label><input type="radio" name="radio10" value="5">Sobr.</label>
                            <label><input type="radio" name="radio10" value="6">Mat.Hon.</label>
                            </div>
                            <div class="row">
                            <h4><?PHP print($preg[11]); ?></h4>
                            <label><input type="radio" name="radio11" value="1">Menos 50%</label>
                            <label><input type="radio" name="radio11" value="2">Entre 50% y 80%</label>
                            <label><input type="radio" name="radio11" value="3">Más de 80%</label>
                            </div>
                            <input type="submit" value="Siguiente" class="primary rounded" name="siguiente" />
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>

    </html>

    <?PHP
if (isset($_POST['siguiente'])) {
       
        $checked = false;
        for ($k = 1; $k <= count($preg) && !$checked; $k++) {
            if (empty($_POST["radio$k"])) {
                $checked = true;
            }
        }
        if (!$checked) {
            $query = "INSERT INTO RESPUESTASGENERALES (edad,sexo,cursomasalto,cursomasbajo,
            vecesmatricula,vecesconvocatorias,interesasig,usotutorias,dificultadasig,calificacionesperada,asistenciaclase)
            VALUES('" . $_POST['radio1'] . "','" . $_POST['radio2'] . "','" . $_POST['radio3'] . "','" . $_POST['radio4'] . "'
            ,'" . $_POST['radio5'] . "','" . $_POST['radio6'] . "','" . $_POST['radio7'] . "','" . $_POST['radio8'] . "'
            ,'" . $_POST['radio9'] . "','" . $_POST['radio10'] . "','" . $_POST['radio11'] . "')";

            $conexion->prepare($query)->execute();
            

            }
            
    }
} else {
    header("Location:encuestas.php");
}
?>
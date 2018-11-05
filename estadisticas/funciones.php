<?php
function getQueryArray($conexion, $query, $bind)
{
    try {
        $resultado = $conexion->prepare($query);
        for ($i = 0; $i < count($bind[0]); $i++) {
            $resultado->bindValue($bind[0][$i], $bind[1][$i]);
        }
        $resultado->execute();
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
    return $resultado->fetchAll(\PDO::FETCH_NUM);
}

function respuestas($datos)
{
    $array = eliminarID($datos);
    $sumArray = array(
        array_fill(0, 23, 0),
        array_fill(0, 23, 0),
        array_fill(0, 23, 0),
        array_fill(0, 23, 0),
        array_fill(0, 23, 0),
        array_fill(0, 23, 0),
    );
    if (count($array) > 0) {
        for ($i = 0; $i < count($array[0]); $i++) {
            for ($j = 0; $j < count($array); $j++) {
                switch ($array[$j][$i]) {
                    case 0:
                        $sumArray[0][$i]++;
                        break;
                    case 1:
                        $sumArray[1][$i]++;
                        break;
                    case 2:
                        $sumArray[2][$i]++;
                        break;
                    case 3:
                        $sumArray[3][$i]++;
                        break;
                    case 4:
                        $sumArray[4][$i]++;
                        break;
                    case 5:
                        $sumArray[5][$i]++;
                        break;
                }
            }
        }
    }
    return $sumArray;
}

function getRespuestaPreguntaX($array, $col)
{
    for ($i = 0; $i < count($array); $i++) {
        $resp[] = $array[$i][$col];
    }
    return $resp;
}

function eliminarID($array)
{
    for ($i = 0; $i < count($array); $i++) {
        array_shift($array[$i]);
    }
    return $array;
}

function filtrosQuery($array, $query)
{
    for ($i = 0; $i < count($array[0]) - 1; $i++) {
        $query .= sprintf("%s= %s AND ", $array[0][$i], $array[1][$i]);
    }
    $query .= sprintf("%s= %s))", $array[0][$i], $array[1][$i]);
    return $query;
}

function valuesFiltros()
{
    return [
        1 => "edad",
        2 => "sexo",
        3 => "cursomasalto",
        4 => "cursomasbajo",
        5 => "vecesmatricula",
        6 => "vecesconvocatorias",
        7 => "interesasig",
        8 => "usotutorias",
        9 => "dificultadasig",
        10 => "calificacionesperada",
        11 => "asistenciaclase",
    ];
}

function opcionesFiltros()
{
    return array(
        array(),
        array("19", "20 - 21", "22 - 23", "25 -25", "> 25"),
        array("Hombre", "Mujer"),
        array("1°", "2°", "3°", "4°", "5°", "6°"),
        array("1°", "2°", "3°", "4°", "5°", "6°"),
        array("1", "2", "3", "> 3"),
        array("1", "2", "3", "> 3"),
        array("Nada", "Algo", "Bastante", "Mucho"),
        array("Nada", "Algo", "Bastante", "Mucho"),
        array("Baja", "Media", "Alta", "Muy Alta"),
        array("N. P", "Suspenso", "Aprobado", "Notable", "Sobresaliente", "Matricula de Honor"),
        array("Menos 50%", "Entre 50% y 80%", "Más de 80%"),
    );
}

function comprobarPOST()
{
    $marcados = array(array(), array());
    $vals = valuesFiltros();
    for ($i = 1; $i < count($vals); $i++) {
        if (isset($_POST["$vals[$i]"])) {
            $marcados[0][] = "$vals[$i]";
            $marcados[1][] = $_POST["$vals[$i]"];
        }
    }
    return $marcados;
}

<?php

function getArrayQuery($conexion, $query, $bind)
{
    try {
        $resultado = $conexion->prepare($query);
        for ($i = 0; $i < count($bind[0]); $i++) {
            $resultado->bindValue($bind[0][$i], $bind[1][$i]);
        }
        $resultado->execute();
        $array = $resultado->fetchAll(\PDO::FETCH_NUM);
    } catch (Exception $e) {
        exit("error" . $e->getMessage());
    }
    return $array;
}

function setArrayUpdate($conexion, $query, $bind)
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
}

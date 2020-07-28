<?php

// Incluir la conexion
require_once "config/conexion.php";

function obtenerPaises($conexion)
{
    $sql = "SELECT * FROM country";
    return $conexion->query($sql)->fetchAll();

}

function insertarPaises($conexion, $datos)
{
    $sql = "INSERT INTO country (country) VALUES (:nombrePais);";

    return $conexion->prepare($sql)->execute($datos);


}
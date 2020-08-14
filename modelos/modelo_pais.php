<?php

// Incluir la conexion
require_once "config/conexion.php";

function obtenerPaises($conexion)
{
    $sql = "SELECT * FROM country";
    return $conexion->query($sql)->fetchAll();

}

// insertar paises
function insertarPaises($conexion, $datos)
{
    $sql = "INSERT INTO country (country) VALUES (:nombrePais);";
    return $conexion->prepare($sql)->execute($datos);

}

// Eliminar ciudades
function eliminarPaises($conexion, $datos)
{
    $sql = " UPDATE city SET country_id = 1 WHERE country_id = :idPais;
            DELETE FROM country WHERE country_id = :idPais ;";

    return $conexion->prepare($sql)->execute($datos);

}


// Obtener pais po id
function obtenerPaisesPorId($conexion, $datos)
{
    $sql = "SELECT * FROM country WHERE country_id = :idPais;";

    $query = $conexion->prepare($sql);
    $query->execute($datos);

    return $query->fetch();
}


// editar actores
function editarPaises($conexion, $datos)
{
    $sql = "UPDATE country SET country = :nombrePais WHERE country_id = :idPais;";

    return $conexion->prepare($sql)->execute($datos);
}
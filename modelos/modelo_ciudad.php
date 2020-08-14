<?php

require_once "config/conexion.php";

function obtenerCiudades($conexion)
{
    $sql = "SELECT ci.city_id, ci.city, co.country_id, co.country 
            FROM city as ci INNER JOIN country as co ON ci.country_id=co.country_id";
    return $conexion->query($sql)->fetchAll();

}

function insertarCiudades($conexion, $datos)
{
    $sql = "INSERT INTO city (city, country_id) VALUES (:nombreCiudad, :idPais);";

    return $conexion->prepare($sql)->execute($datos);
}


// Eliminar ciudades
function eliminarCiudades($conexion, $datos)
{
    $sql = " UPDATE address SET city_id = 1 WHERE city_id = :idCiudad;
            DELETE FROM city WHERE city_id = :idCiudad;";

    return $conexion->prepare($sql)->execute($datos);

}

// Editar ciudades
function obtenerCiudadPorId($conexion, $datos)
{
    $sql = "SELECT * FROM city where city_id = :idCiudad;";
    $query = $conexion->prepare($sql);
    $query->execute($datos);
    return $query->fetch();
}

function editarCiudades($conexion, $datos)
{
    $sql = "UPDATE city SET city=:nombreCiudad, country_id = :idPais WHERE city_id = :idCiudad;";
    return $conexion->prepare($sql)->execute($datos);
}
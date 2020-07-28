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


<?php

require_once "config/conexion.php";

// obtener actores
function obtenerActores($conexion)
{
    $sql = "SELECT * FROM actor;";
    return $conexion->query($sql)->fetchAll();
}

// insertar actores
function insertarActores($conexion, $datos)
{
    $sql = "INSERT INTO actor (first_name, last_name) VALUES (:nombreActor, :apellidoActor);";
    return $conexion->prepare($sql)->execute($datos);
}

// Eliminar actores
function eliminarActores($conexion, $datos)
{
    $sql = "DELETE FROM film_actor WHERE actor_id = :idActor;
            DELETE FROM actor WHERE actor_id = :idActor;";

    return $conexion->prepare($sql)->execute($datos);

}


function obtenerActoresPorId($conexion, $datos)
{
    $sql = "SELECT * FROM actor WHERE actor_id = :idActor;";

    $query = $conexion->prepare($sql);
    $query->execute($datos);

    return $query->fetch();
}

function editarActores($conexion, $datos)
{
    $sql = "UPDATE actor SET first_name = :nombreActor, last_name = :apellidoActor WHERE actor_id = :idActor;";

    return $conexion->prepare($sql)->execute($datos);
}
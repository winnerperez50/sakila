<?php

require_once "config/conexion.php";

function obtenerIdiomas($conexion)
{
    $sql = "SELECT * FROM language";

    return $conexion->query($sql)->fetchAll();
}

function insertarIdiomas($conexion, $datos)
{
    $sql = "INSERT INTO language (name) VALUES (:nombreIdioma);";

    return $conexion->prepare($sql)->execute($datos);

}


// Eliminar idiomas
function eliminarIdiomas($conexion, $datos)
{
    $sql = " UPDATE film SET language_id = 1 WHERE language_id = :idIdioma;
             UPDATE film SET original_language_id = 1 WHERE original_language_id = :idIdioma;
            DELETE FROM language WHERE language_id = :idIdioma;";

    return $conexion->prepare($sql)->execute($datos);

}


// Editar idiomas
function obtenerIdiomasPorId($conexion, $datos)
{
    $sql = "SELECT * FROM language where language_id = :idIdioma;";
    $query = $conexion->prepare($sql);
    $query->execute($datos);
    return $query->fetch();
}

function editarIdiomas($conexion, $datos)
{
    $sql = "UPDATE language SET name = :nombreIdioma WHERE language_id = :idIdioma;";
    return $conexion->prepare($sql)->execute($datos);
}
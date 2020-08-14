<?php

require_once "config/conexion.php";

function obtenerCategorias($conexion)
{
    $sql = "SELECT * FROM category";
    return $conexion->query($sql)->fetchAll();

}

function insertarCategorias($conexion, $datos)
{
    $sql = "INSERT INTO category (name) VALUES (:nombreCategoria);";

    return $conexion->prepare($sql)->execute($datos);

}


// Eliminar ciudades
function eliminarcategorias($conexion, $datos)
{
    $sql = " UPDATE film_category SET category_id = 1 WHERE category_id = :idCategoria;
            DELETE FROM category WHERE category_id = :idCategoria;";

    return $conexion->prepare($sql)->execute($datos);

}


function obtenerCategoriaPorId($conexion, $datos)
{
    $sql = " SELECT * FROM category where category_id = :idCategoria;";
    $query = $conexion->prepare($sql);
    $query->execute($datos);
    return $query->fetch();

}


function editarCategoria($conexion, $datos)
{
    $sql = " UPDATE category SET name = :nombreCategoria WHERE category_id = :idCategoria ;";
    return $conexion->prepare($sql)->execute($datos);
}
<?php

require_once "config/conexion.php";


function obtenerInfoPeliculas($conexion)
{
    $sql = "SELECT fi.film_id, fi.title, fi.description, fi.release_year, lan.name AS idioma_oficial, 
    la.name AS idioma_sec, fi.rental_duration, fi.rental_rate,
    fi.length, fi.replacement_cost, fi.rating, fi. special_features FROM film as fi
    INNER JOIN language AS lan on fi.language_id = lan.language_id
    LEFT JOIN language AS la ON fi.original_language_id = la.language_id;";

    return $conexion->query($sql)->fetchAll();
}

function insertarPelicula($conexion, $datos)
{
    $sql = 'INSERT INTO film (title, description, release_year, language_id, original_language_id,
                  rental_duration, rental_rate, length, replacement_cost, rating, special_features)
                  VALUES (:titulo, :descripcion, :anoLanzamiento, :idioma, :idioma2, 
                          :duracion, :arrendamiento, :tamano, 
                          :reemplazo, :clasificacion, :caracteristicasEspeciales )';
    return $conexion->prepare($sql)->execute($datos);
}
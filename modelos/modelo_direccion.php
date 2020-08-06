<?php

require_once "config/conexion.php";

function obtenerDirecciones($conexion)
{
    $sql = "SELECT * FROM address";
    return $conexion->query($sql)->fetchAll();

}


function insertarDireccion($conexion, $datos)
{
    $sql = "INSERT INTO address (address, address2, district, city_id, postal_code, phone) 
        VALUES (:direccion, :direccion2, :distrito, :ciudad, :codigoPostal, :telefono);";

    return $conexion->prepare($sql)->execute($datos);


}

function obtenerInfoDirecciones($conexion)
{
    $sql = "select ad.address_id, ad.address,ad.address2,ad.district, cy.city, ad.postal_code, ad.phone
     from address as ad left join city as cy on ad.city_id=cy.city_id";
    return $conexion->query($sql)->fetchAll();
}
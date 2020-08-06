<?php

require_once "config/conexion.php";

function obtenerInformacionClientes($conexion)
{
    $sql = "SELECT customer_id,
       c.store_id,
       c.first_name,
       c.last_name,
       CONCAT(C.first_name, ' ', C.last_name) AS name,
       LOWER(c.email) AS email,
       c.address_id,
       c.create_date,
       DATE_FORMAT(c.create_date, '%d-%m-%Y %l:%i %p') AS fecha,
       a.address,
       IF(c.active = 1, 'Si', 'No') AS activo,
       c.active
FROM customer AS c
LEFT JOIN store AS s on c.store_id = s.store_id
LEFT JOIN address a on c.address_id = a.address_id
ORDER BY c.first_name 
;";
    return $conexion->query($sql)->fetchAll();

}

function insertarClientes($conexion, $datos)
{
    $sql = "INSERT INTO customer (store_id, first_name, last_name, email, address_id, active) 
VALUES (:tiendas, :nombre, :apellido, :email, :direccion, :activo)";
    return $conexion->prepare($sql)->execute($datos);
}



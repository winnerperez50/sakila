<?php

require_once "config/conexion.php";

function obtenerPersonal($conexion)
{
    $sql = "SELECT * FROM staff";
    return $conexion->query($sql)->fetchAll();

}

function obtenerInfoPersonales($conexion)
{
    $sql = "select sta.staff_id, sta.first_name, sta.last_name ,ad.address, sta.email, sto.store_id,
  IF(sta.active = 1, 'Si', 'No') AS activo,
       sta.active, sta.username, sta.password
from staff as sta left join address as ad on sta.address_id= ad.address_id  left join store as sto on sta.store_id= sto.store_id";
    return $conexion->query($sql)->fetchAll();
}

function insertarPersonal($conexion, $datos)
{
    $sql = "INSERT INTO staff (first_name, last_name, address_id,  email, store_id, active, username, password) 
values (:nombre, :apellido, :idDireccion, :email, :idTienda, :activo, :nombreUsuario, :password)";
    return $conexion->prepare($sql)->execute($datos);
}

<?php

require_once "config/conexion.php";

function obtenerPersonal($conexion)
{
    $sql = "SELECT * FROM customer";
    return $conexion->query($sql)->fetchAll();

}


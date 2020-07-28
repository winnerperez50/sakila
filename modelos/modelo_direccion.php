<?php

require_once "config/conexion.php";

function obtenerDirecciones($conexion)
{
    $sql = "SELECT * FROM address";
    return $conexion->query($sql)->fetchAll();

}

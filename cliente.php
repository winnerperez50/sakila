<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_cliente.php";
require_once "modelos/modelo_direccion.php";
require_once "modelos/modelo_tienda.php";


$nombrePagina = "Cliente";

$clientes = obtenerClientes($conexion);
$tiendas = obtenerTiendas($conexion);
$direcciones = obtenerDirecciones($conexion);
// $direccion = obtenerDirecciones($conexion);


// Incluir la vista
include_once "vistas/vista_cliente.php";
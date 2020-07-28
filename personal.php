<?php


require_once "funciones/ayudante.php";
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_tienda.php";
require_once "modelos/modelo_direccion.php";

$tiendas = obtenerTiendas($conexion);
$direcciones = obtenerDirecciones($conexion);

$nombrePagina = "Personal";


// incluir vista

include_once "vistas/vista_personal.php";

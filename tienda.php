<?php

// incluir modelos
require_once "funciones/ayudante.php";
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_tienda.php";
require_once "modelos/modelo_direccion.php";

$direcciones = obtenerDirecciones($conexion);
$personales = obtenerPersonal($conexion);
$informacionTiendas = obtenerInformacionTiendas($conexion);
$nombrePagina = "Tienda";


// incluir vista

include_once "vistas/vista_tienda.php";

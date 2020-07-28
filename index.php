<?php

require_once "funciones/ayudante.php";

//incluir los modelos
require_once "modelos/modelo_actor.php";

$actores = obtenerActores($conexion);

$nombrePagina = "Principal";

// Incluir la vista
include_once "vistas/vista_principal.php";
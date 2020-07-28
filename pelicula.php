<?php


require_once "funciones/ayudante.php";
require_once "modelos/modelo_idioma.php";

$idiomas = obtenerIdiomas($conexion);
{
}

$nombrePagina = "Pelicula";


// incluir vista

include_once "vistas/vista_pelicula.php";

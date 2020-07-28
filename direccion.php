<?php


require_once "funciones/ayudante.php";

$nombrePagina = "Direccion";

// Incluir los modelos
require_once "modelos/modelo_ciudad.php";

$ciudades = obtenerCiudades($conexion);


$direccion = $_POST["direccion"] ?? "";
$direccion2 = $_POST["direccion2"] ?? "";
$distrito = $_POST["distrito"] ?? "";
$ciudad = $_POST["ciudad"] ?? "";
$codigoPostal = $_POST["codigoPostal"] ?? "";
$telefono = $_POST["telefono"] ?? "";
$ubicacion = $_POST["ubicaion"] ?? "";

// Cuando el usuario haga click en el boton guardar direccion
if ( isset($_POST["guardarDireccion"]) ) {
    //codigo para la base de datos
    echo "guardando datos....";
}


// incluir vista
include_once "vistas/vista_direccion.php";
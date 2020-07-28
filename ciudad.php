<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_ciudad.php";
require_once "modelos/modelo_pais.php";
$nombrePagina = "Ciudad";

// Declarar las variabes
$nombreCiudad = $_POST["nombreCiudad"] ?? "";
$idPais = $_POST["pais"] ?? "";

// Asegurarnos de que el usuario alla echo click en el boton guardar.
try {
    if ( isset($_POST['guardar_ciudad']) ) {

        // Validar los datos
        if ( empty($nombreCiudad) ) {
            throw  new Exception("El nombre de la ciudad no puede estar vacio. ");
        }
        if ( empty($idPais) ) {
            throw new Exception("Debe seleccionar un pais");
        }

        // Preparar el array con los datos
        $datos = compact('nombreCiudad', 'idPais');

        // Insertar los datos
        $ciudadInsertada = insertarCiudades($conexion, $datos);
        $mensaje = "Los datos de ciudad se guardaron correctamente";

        // Lanzar error si no se han insertado los datos
        if ( ! $ciudadInsertada ) {
            throw new Exception("Ha ocurrido un error al insertar los datos de la ciuada");
        }

        // Redireccionar la pagina
        redireccionar("ciudad.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}

// Traer los datos de los modelos
$paises = obtenerPaises($conexion);
$ciudades = obtenerCiudades($conexion);


// Incluye la vista
include_once "vistas/vista_ciudad.php";

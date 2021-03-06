<?php

// incluir modelos
require_once "funciones/ayudante.php";
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_tienda.php";
require_once "modelos/modelo_direccion.php";
$nombrePagina = "Tienda";


// Declarar las variabes
$idGerentePersonal = $_POST["gerentePersonal"] ?? "";
$idGerenteDireccion = $_POST["gerenteDireccion"] ?? "";


// Asegurarnos de que el usuario alla echo click en el boton guardar ciudad.
try {
    if ( isset($_POST['guardarTienda']) ) {

        // Validar los datos
        if ( empty($idGerentePersonal) ) {
            throw  new Exception("Debe seleccionar un gerente ");
        }
        if ( empty($idGerenteDireccion) ) {
            throw new Exception("Debe seleccionar una direccion");
        }

        // Preparar el array con los datos
        $datos = compact('idGerentePersonal', 'idGerenteDireccion');

        // Insertar los datos
        $ciudadInsertada = insertarTienda($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos de ciudad se guardaron correctamente";

        // Lanzar error si no se han insertado los datos
        if ( ! $ciudadInsertada ) {
            throw new Exception("Ha ocurrido un error al insertar los datos de la ciudad");
        }

        // Redireccionar la pagina
        redireccionar("tienda.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}


// Traer los datos de los modelos
$direcciones = obtenerDirecciones($conexion);
$personales = obtenerPersonal($conexion);


$informacionTiendas = obtenerInformacionTiendas($conexion);

// incluir vista
include_once "vistas/vista_tienda.php";

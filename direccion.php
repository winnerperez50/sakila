<?php


// Incluir los modelos
require_once "modelos/modelo_ciudad.php";
require_once "modelos/modelo_direccion.php";
require_once "funciones/ayudante.php";
$nombrePagina = "Direccion";


// Declara las variables
$direccion = $_POST["direccion"] ?? "";
$direccion2 = $_POST["direccion2"] ?? "";
$distrito = $_POST["distrito"] ?? "";
$ciudad = $_POST["ciudad"] ?? "";
$codigoPostal = $_POST["codigoPostal"] ?? "";
$telefono = $_POST["telefono"] ?? "";

try {
    if ( isset($_POST['guardarDireccion']) ) {

        // validar los datos
        if ( empty($direccion) ) {
            throw new Exception("La direccion esta vacia. Favor llenarlo.....");
        }

        if ( empty($direccion2) ) {
            throw new Exception("La direccion2 esta vacia. Favor llenarlo.....");
        }

        if ( empty($distrito) ) {
            throw new Exception("El distrito esta vacio. Favor llenarlo.....");
        }

        if ( empty($ciudad) ) {
            throw new Exception("La ciudad esta vacia. Favor llenarlo.....");
        }

        if ( empty($codigoPostal) ) {
            throw new Exception("El codigo postal esta vacio. Favor llenarlo.....");
        }

        if ( empty($telefono) ) {
            throw new Exception("El numero de telefono esta vacio. Favor llenarlo.....");
        }


        $datos = compact('direccion', 'direccion2', 'distrito', 'ciudad', 'codigoPostal', 'telefono');
        //Insertar los datos
        $direccionInsertada = insertarDireccion($conexion, $datos);

        $mensajes = "Datos insertados correctamente...";
        if ( ! $direccionInsertada ) {
            throw new Exception("Ocurrió un error al insertar los datos de la dirección");
        }
        //redireccionar la pagina
        redireccionar('direccion.php');

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}

// Obtener informacion
$infoDirecciones = obtenerInfoDirecciones($conexion);
$direccion = obtenerDirecciones($conexion);
$ciudades = obtenerCiudades($conexion);

// incluir vista
include_once "vistas/vista_direccion.php";
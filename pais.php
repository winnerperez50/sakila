<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_pais.php";
$nombrePagina = "Pais";

// Declarar las variabes
$nombrePais = $_POST["nombrePais"] ?? "";

try {
    if ( isset($_POST['guardarPais']) ) {

        // Validar los datos
        if ( empty($nombrePais) ) {
            throw new Exception("Debe escribir un pais");
        }

        // Preparar el array con los datos
        $datos = compact('nombrePais');

        // Insertar los datos
        $paisInsertado = insertarPaises($conexion, $datos);
        $mensaje = "Los datos de ciudad se guardaron correctamente";

        // Lanzar error si no se han insertado los datos
        if ( ! $paisInsertado ) {
            throw new Exception("Ha ocurrido un error al insertar los datos del pais");
        }

        // Redireccionar la pagina
        redireccionar("pais.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();

}


$paises = obtenerPaises($conexion);

// incluir vista
include_once "vistas/vista_pais.php";






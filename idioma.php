<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_idioma.php";
$nombrePagina = "Idioma";

// Declarar las variabes
$nombreIdioma = $_POST["nombreIdioma"] ?? "";


// Asegurarnos de que el usuario haya echo click en el botom Guardar idioma
try {
    if ( isset($_POST['guardarIdiomas']) ) {

        // Validar los datos
        if ( empty($nombreIdioma) ) {
            throw new Exception("Debe escribir un idioma");
        }

        // Preparar el array con los datos
        $datos = compact('nombreIdioma');

        // Insertar los datos
        $idiomaInsertado = insertarIdiomas($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos de ciudad se guardaron correctamente";

        // Lanzar error si no se han insertado los datos
        if ( ! $idiomaInsertado ) {
            throw new Exception("Ha ocurrido un error al insertar los datos del idioma");
        }

        // Redireccionar la pagina
        redireccionar("idioma.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$idiomas = obtenerIdiomas($conexion);

// incluir vista
include_once "vistas/vista_idioma.php";

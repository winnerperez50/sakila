<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_idioma.php";
$nombrePagina = "Idioma";

// Declarar las variabes
$nombreIdioma = $_POST["nombreIdioma"] ?? "";
$idIdioma = $_POST["idIdioma"] ?? "";


// Asegurarnos de que el usuario haya echo click en el botom Guardar idioma
try {
    if ( isset($_POST['guardarIdiomas']) ) {

        // Validar los datos
        if ( empty($nombreIdioma) ) {
            throw new Exception("Debe escribir un idioma");
        }

        // Preparar el array con los datos
        $datos = compact('nombreIdioma');

        if ( empty($idIdioma) ) {// Insertar los datos
            $idiomaInsertado = insertarIdiomas($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos de ciudad se guardaron correctamente";// Lanzar error si no se han insertado los datos
            if ( ! $idiomaInsertado ) {
                throw new Exception("Ha ocurrido un error al insertar los datos del idioma");
            }
        } else {
            // Agregar el id al array
            $datos["idIdioma"] = $idIdioma;
            // Actualiar datos
            $idiomaEditado = editarIdiomas($conexion, $datos);
            $_SESSION["mensaje"] = "Datos modificados correctamente";
            if ( ! $idiomaEditado ) {
                throw new Exception("Ocurrio un error al modificar los datos");
            }
        }

        // Redireccionar la pagina
        redireccionar("idioma.php");

    }


    if ( isset($_POST['eliminarIdioma']) ) {
        $idIdioma = $_POST['eliminarIdioma'] ?? "";

        // Validar
        if ( empty($idIdioma) ) {
            throw new Exception("El nombre del idioma no puede estar vacio.");
        }

        // Preparar array
        $datos = compact('idIdioma');

        // Eliminar<
        $eliminado = eliminarIdiomas($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos fueron eliminados correctamente";

        // Lanzar error
        if ( ! $eliminado ) {
            throw new Exception("Los datos no se eliminaron correctamente.");
        }

        // Redericcionar
        redireccionar('idioma.php');

    }


    if ( isset($_POST['editarIdioma']) ) {
        $idIdioma = $_POST['editarIdioma'] ?? "";

        if ( empty($idIdioma) ) {
            throw new Exception("EL valor del id del idioma esta vacio.");

        }

        $datos = compact('idIdioma');

        $resultado = obtenerIdiomasPorId($conexion, $datos);

        $nombreIdioma = $resultado['name'];


        $idIdioma = $resultado['language_id'];

    }


} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$idiomas = obtenerIdiomas($conexion);

// incluir vista
include_once "vistas/vista_idioma.php";

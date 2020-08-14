<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_ciudad.php";
require_once "modelos/modelo_pais.php";
$nombrePagina = "Ciudad";

// Declarar las variabes
$nombreCiudad = $_POST["nombreCiudad"] ?? "";
$idPais = $_POST["pais"] ?? "";
$idCiudad = $_POST['idCiudad'] ?? "";

// Asegurarnos de que el usuario alla echo click en el boton guardar ciudad.
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

        if ( empty($idCiudad) ) {
            // Insertar los datos
            $ciudadInsertada = insertarCiudades($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos de ciudad se guardaron correctamente";// Lanzar error si no se han insertado los datos
            if ( ! $ciudadInsertada ) {
                throw new Exception("Ha ocurrido un error al insertar los datos de la ciuada");
            }
        } else {
            // Agregar el id al array
            $datos["idCiudad"] = $idCiudad;
            //actualizar datos
            $ciudadEditada = editarCiudades($conexion, $datos);
            $_SESSION["mensaje"] = " Datos modificados  correctamente";
            if ( ! $ciudadEditada ) {
                throw new Exception("ocurrio un error al modificar los datos");
            }
        }

        // Redireccionar la pagina
        redireccionar("ciudad.php");

    }


    if ( isset($_POST['eliminarCiudad']) ) {
        $idCiudad = $_POST['eliminarCiudad'] ?? "";

        // Validar
        if ( empty($idCiudad) ) {
            throw new Exception("El nombre de ciudad no puede estar vacio.");
        }

        // Preparar array
        $datos = compact('idCiudad');

        // Eliminar<
        $eliminado = eliminarCiudades($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos fueron eliminados correctamente";

        // Lanzar error
        if ( ! $eliminado ) {
            throw new Exception("Los datos no se eliminaron correctamente.");
        }

        // Redericcionar
        redireccionar('ciudad.php');

    }


    if ( isset($_POST['editarCiudad']) ) {
        $idCiudad = $_POST['editarCiudad'] ?? "";

        if ( empty($idCiudad) ) {
            throw new Exception("EL valor del id del ciudad esta vacio.");

        }

        $datos = compact('idCiudad');

        $resultado = obtenerCiudadPorId($conexion, $datos);

        $nombreCiudad = $resultado['city'];

        $idPais = $resultado['country_id'];

    }


} catch ( Exception $e ) {
    $error = $e->getMessage();
}

// Traer los datos de los modelos
$paises = obtenerPaises($conexion);
$ciudades = obtenerCiudades($conexion);


// Incluye la vista
include_once "vistas/vista_ciudad.php";

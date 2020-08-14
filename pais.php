<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_pais.php";
$nombrePagina = "Pais";

// Declarar las variabes
$idPais = $_POST["idPais"] ?? "";
$nombrePais = $_POST["nombrePais"] ?? "";


// Asegurarnos de que el usuario haya echo click en el botom Guardar pais
try {
    if ( isset($_POST['guardarPais']) ) {

        // Validar los datos
        if ( empty($nombrePais) ) {
            throw new Exception("Debe escribir un pais");
        }

        // Preparar el array con los datos
        $datos = compact('nombrePais');

        if ( empty($idPais) ) {
            // Insertar los datos
            $paisInsertado = insertarPaises($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos de ciudad se guardaron correctamente";


            // Lanzar error si no se han insertado los datos
            if ( ! $paisInsertado ) {
                throw new Exception("Ha ocurrido un error al insertar los datos del pais");
            }
        } else {
            // Agregar el id al array datos
            $datos['idPais'] = $idPais;


            // actualizar datos
            $paisEditado = editarPaises($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos fueron editados correctamente";


            if ( ! $paisEditado ) {
                throw  new  Exception("ocurrio un error al editar los datos");
            }
        }
        // Redireccionar la pagina
        redireccionar("pais.php");

    }


    // Asegurarnos que el usuario haya echo click en el boton eliminar pais
    if ( isset($_POST['eliminarPais']) ) {
        $idPais = $_POST['eliminarPais'] ?? "";

        // Validar
        if ( empty($idPais) ) {
            throw new Exception("El id de pais no puede estar vacio.");
        }

        // Preparar array
        $datos = compact('idPais');

        // Eliminar pais
        $eliminado = eliminarPaises($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos fueron eliminados correctamente";

        // Lanzar un error
        if ( ! $eliminado ) {
            throw new Exception("Los datos no se eliminaron correctamente.");
        }

        // Redericcionar
        redireccionar('pais.php');

    }


    // Asegurarnos que el usuario haya hecho clic en el boton editar pais
    if ( isset($_POST['editarPais']) ) {
        $idPais = $_POST['editarPais'] ?? "";

        if ( empty($idPais) ) {
            throw new Exception("El valor del id del pais esta vacio.");
        }

        $datos = compact('idPais');


        $resultado = obtenerPaisesPorId($conexion, $datos);

        $nombrePais = $resultado['country'];

    }

} catch ( Exception $e ) {
    $error = $e->getMessage();

}


$paises = obtenerPaises($conexion);

// incluir vista
include_once "vistas/vista_pais.php";



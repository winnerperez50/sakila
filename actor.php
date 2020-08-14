<?php


include_once "funciones/ayudante.php";
include_once "modelos/modelo_actor.php";


$nombrePagina = "Actor";

//Declarar las variables
$idActor = $_POST['idActor'] ?? "";
$nombreActor = $_POST["nombreActor"] ?? "";
$apellidoActor = $_POST["apellidoActor"] ?? "";


try {

    // Asegurarnos de que el usuario haya echo click en el boton Guardar Actor
    if ( isset($_POST['guardar_actor']) ) {

        // validar los datos
        if ( empty($nombreActor) ) {
            throw new Exception("El nombre esta vacio. Favor llenarlo.....");
        }

        if ( empty($apellidoActor) ) {
            throw new Exception("El apellido esta vacio. Favor llenarlo.....");
        }

        // Preparar el arraay con los datos
        $datos = compact("nombreActor", "apellidoActor");

        if ( empty($idActor) ) {
            // insertar los datos
            $actorInsertado = insertarActores($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos del actor se guardaron correctamente";// Lanzar un erros si no se Insertaron correctamente
            if ( ! $actorInsertado ) {
                throw  new Exception("Ocurrio un error al insertar los datos del actor");
            }
        } else {
            // Agregar el id al array datos
            $datos['idActor'] = $idActor;

            // Actualizar datos
            $actorEditado = editarActores($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos fueron editados correctamente";

            if ( ! $actorEditado ) {
                throw  new Exception("Ocurrio un erro al editar los datos");
            }
        }

        // Redireccionar la pagina
        redireccionar("actor.php");
    }


    // Asegurarnos que el usuario haya hecho click en el boton eliminar actor
    if ( isset($_POST['eliminarActor']) ) {
        $idActor = $_POST['eliminarActor'] ?? "";

        // Validar
        if ( empty($idActor) ) {
            throw new Exception("El id del actor no puede estar vacio.");
        }

        // Preparar array
        $datos = compact('idActor');

        // Eliminar<
        $eliminado = eliminarActores($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos fueron eliminados correctamente";

        // Lanzar error
        if ( ! $eliminado ) {
            throw new Exception("Los datos no se eliminaron correctamente.");
        }

        // Redericcionar
        redireccionar('actor.php');

    }


    // Asegurarno que el usuario haya hecho click en el boton editar actor
    if ( isset($_POST['editarActor']) ) {
        $idActor = $_POST['editarActor'] ?? "";

        if ( empty($idActor) ) {
            throw new Exception("EL valor del id del actor esta vacio.");

        }

        $datos = compact('idActor');


        $resultado = obtenerActoresPorId($conexion, $datos);

        $nombreActor = $resultado['first_name'];
        $apellidoActor = $resultado['last_name'];

    }


} catch ( Exception $e ) {
    $error = $e->getMessage();
}


// Cargar datos de los modelos
$actores = obtenerActores($conexion);

// Incluir la vista
include_once "vistas/vista_actor.php";

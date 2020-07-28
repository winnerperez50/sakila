<?php
include_once "modelos/modelo_actor.php";
include_once "funciones/ayudante.php";

$nombrePagina = "Actor";
//Declarar las variables
$nombreActor = $_POST["nombreActor"] ?? "";
$apellidoActor = $_POST["apellidoActor"] ?? "";

// Asegurarnos de que el usuario haya echo click en el botom Guardar Actor
try {
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

        // insertar los datos
        $actorInsertado = insertarActores($conexion, $datos);
        $mensaje = "Los datos del actor se guardaron correctamente";


        // Lanzar un erros si no se Insertaron correctamente
        if ( ! $actorInsertado ) {
            throw  new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redireccionar la pagina
        redireccionar("actor.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}

// Cargar datos de los modelos
$actores = obtenerActores($conexion);

// Incluir la vista
include_once "vistas/vista_actor.php";

<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_idioma.php";
require_once "modelos/modelo_pelicula.php";

$nombrePagina = "Pelicula";


// Declarar las variables
$titulo = $_POST["titulo"] ?? "";
$descripcion = $_POST["descripcion"] ?? "";
$anoLanzamiento = $_POST["anoLanzamiento"] ?? "";
$idIdioma = $_POST["idioma"] ?? "";
$idIdioma2 = $_POST["idioma2"] ?? "";
$duracion = $_POST["duracion"] ?? "";
$arrendamiento = $_POST["arrendamiento"] ?? "";
$tamano = $_POST["tamano"] ?? "";
$reemplazo = $_POST["reemplazo"] ?? "";
$clasificacion = $_POST["clasificacion"] ?? "";
$caracteristicasEspeciales = $_POST["caracteristicasEspeciales"] ?? "";


try {
    if ( isset($_POST['guardarPelicula']) ) {

        // validar los datos
        if ( empty($titulo) ) {
            throw new Exception("El tituo no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($descripcion) ) {
            throw new Exception("La descripcion no puede estar vacia. Favor llenarlo.....");
        }

        if ( empty($anoLanzamiento) ) {
            throw new Exception("El año de lanzamiento no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($idIdioma) ) {
            throw new Exception("El idioma no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($idIdioma2) ) {
            throw new Exception("El idioma secundario no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($duracion) ) {
            throw new Exception("La duracion de la renta no puede estar vacia. Favor llenarlo.....");
        }

        if ( empty($arrendamiento) ) {
            throw new Exception("La tasa de arrendamiento no puede estar vacia. Favor llenarlo.....");
        }

        if ( empty($tamano) ) {
            throw new Exception("El tamaño no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($reemplazo) ) {
            throw new Exception("El costo de reemplazo no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($clasificacion) ) {
            throw new Exception("La clasificacion no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($caracteristicasEspeciales) ) {
            throw new Exception("Las caracteristicas especiales no pueden estar vacia. Favor llenarlo.....");
        }

        $caracteristicasEspeciales = implode(',', $caracteristicasEspeciales);


        // Preparar los datos
        $datos = compact('titulo', 'descripcion', 'anoLanzamiento', 'idIdioma', 'idIdioma2', 'duracion',
            'arrendamiento', 'tamano', 'reemplazo', 'clasificacion', 'caracteristicasEspeciales');

        imprimirArray($datos);
        //Insertar los datos
        $peliculaInsertada = insertarPelicula($conexion, $datos);


        // Insertar los datos
        $mensajes = "Datos insertados correctamente...";
        if ( ! $peliculaInsertada ) {
            throw new Exception("Ocurrió un error al insertar los datos de la pelicula");
        }
        //redireccionar la pagina
        redireccionar('pelicula.php');

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$idiomas = obtenerIdiomas($conexion);
$infoPeliculas = obtenerInfoPeliculas($conexion);

// incluir vista
include_once "vistas/vista_pelicula.php";

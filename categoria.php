<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_categoria.php";
$nombrePagina = "Categoria";

// Declarar las variabes
$nombreCategoria = $_POST["nombreCategoria"] ?? "";

try {
    if ( isset($_POST['guardarCategorias']) ) {

        // Validar los datos
        if ( empty($nombreCategoria) ) {
            throw new Exception("Debe escribir una categoria");
        }

        // Preparar el array con los datos
        $datos = compact('nombreCategoria');

        // Insertar los datos
        $categoriasInsertado = insertarCategorias($conexion, $datos);
        $mensaje = "Los datos de ciudad se guardaron correctamente";

        // Lanzar error si no se han insertado los datos
        if ( ! $categoriasInsertado ) {
            throw new Exception("Ha ocurrido un error al insertar los datos del genero");
        }

        // Redireccionar la pagina
        redireccionar("categoria.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$categorias = obtenerCategorias($conexion);

// incluir vista

include_once "vistas/vista_categorias.php";

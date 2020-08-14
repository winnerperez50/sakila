<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_categoria.php";
$nombrePagina = "Categoria";

// Declarar las variabes
$nombreCategoria = $_POST["nombreCategoria"] ?? "";
$idCategoria = $_POST["idCategoria"] ?? "";


// Asegurarnos de que el usuario haya echo click en el botom Guardar categoria
try {
    if ( isset($_POST['guardarCategorias']) ) {

        // Validar los datos
        if ( empty($nombreCategoria) ) {
            throw new Exception("Debe escribir una categoria");
        }

        // Preparar el array con los datos
        $datos = compact('nombreCategoria');

        if ( empty($idCategoria) ) {
            // Insertar los datos
            $categoriasInsertado = insertarCategorias($conexion, $datos);
            $_SESSION['mensaje'] = "Los datos de ciudad se guardaron correctamente";
            // Lanzar error si no se han insertado los datos
            if ( ! $categoriasInsertado ) {
                throw new Exception("Ha ocurrido un error al insertar los datos del genero");
            }
        } else {
            // Agregar el id al array
            $datos["idCategoria"] = $idCategoria;

            // actualizar datos
            $categoriaEditada = editarCategoria($conexion, $datos);
            $_SESSION["mensaje"] = "Datos modificados correctamente";
            if ( ! $categoriaEditada ) {
                throw new Exception("Ocurrio unn error al modificar los datos");
            }

        }

        // Redireccionar la pagina
        redireccionar("categoria.php");

    }


    if ( isset($_POST['eliminarCategoria']) ) {
        $idCategoria = $_POST['eliminarCategoria'] ?? "";

        // Validar
        if ( empty($idCategoria) ) {
            throw new Exception("El nombre de la categoria no puede estar vacio.");
        }

        // Preparar array
        $datos = compact('idCategoria');

        // Eliminar
        $eliminado = eliminarcategorias($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos fueron eliminados correctamente";

        // Lanzar error
        if ( ! $eliminado ) {
            throw new Exception("Los datos no se eliminaron correctamente.");
        }

        // Redericcionar
        redireccionar('categoria.php');

    }


    if ( isset($_POST['editarCategoria']) ) {
        $idCategoria = $_POST['editarCategoria'] ?? "";


        if ( empty($idCategoria) ) {
            throw new Exception("EL valor del id de la categoria esta vacio.");

        }

        $datos = compact('idCategoria');

        $resultado = obtenerCategoriaPorId($conexion, $datos);

        $nombreCategoria = $resultado['name'];

        $idCategoria = $resultado['category_id'];


    }


} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$categorias = obtenerCategorias($conexion);

// incluir vista

include_once "vistas/vista_categorias.php";

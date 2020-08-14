<?php

require_once "funciones/ayudante.php";
require_once "modelos/modelo_cliente.php";
require_once "modelos/modelo_direccion.php";
require_once "modelos/modelo_tienda.php";
$nombrePagina = "Cliente";


//Declarar las variables
$tiendas = $_POST["tiendas"] ?? "";
$nombre = $_POST["nombre"] ?? "";
$apellido = $_POST["apellido"] ?? "";
$direccion = $_POST["direccion"] ?? "";
$email = $_POST["email"] ?? "";
if ( isset($_POST["activo"]) ) {
    $activo = 1;
} else {
    $activo = 0;
}
$fecha = $_POST["fecha"] ?? "";


// Asegurarnos de que el usuario haya echo click en el boton Guardar cliente
try {
    if ( isset($_POST['guardarCliente']) ) {

        // validar los datos
        if ( empty($tiendas) ) {
            throw new Exception("La tienda esta vacia. Favor llenarlo.....");
        }

        if ( empty($nombre) ) {
            throw new Exception("El nombre esta vacio. Favor llenarlo.....");
        }

        if ( empty($apellido) ) {
            throw new Exception("El apellido esta vacio. Favor llenarlo.....");
        }


        if ( empty($email) ) {
            throw new Exception("El correo no puede estar vacio. Favor llenarlo......");
        }

        if ( empty($direccion) ) {
            throw new Exception("La direccion no puede estar vacia. Favor llenarlo.....");
        }


        //Preparar array con los datos//
        $datos = [
            'tiendas'   => $tiendas,
            'nombre'    => $nombre,
            'apellido'  => $apellido,
            'direccion' => $direccion,
            'email'     => $email,
            'activo'    => $activo

        ];


        // insertar los datos
        $infoClientes = insertarClientes($conexion, $datos);
        $_SESSION['mensaje'] = "Los datos del actor se guardaron correctamente";


        // Lanzar un erros si no se Insertaron correctamente
        if ( ! $infoClientes ) {
            throw  new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redireccionar la pagina
        redireccionar("cliente.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$tiendas = obtenerTiendas($conexion);
$direcciones = obtenerDirecciones($conexion);
$informacionClientes = obtenerInformacionClientes($conexion);

// Incluir la vista
include_once "vistas/vista_cliente.php";
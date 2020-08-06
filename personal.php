<?php


require_once "funciones/ayudante.php";
require_once "modelos/modelo_personal.php";
require_once "modelos/modelo_tienda.php";
require_once "modelos/modelo_direccion.php";

$nombrePagina = "Personal";

//Declarar las variables
$nombre = $_POST["nombre"] ?? "";
$apellido = $_POST["apellido"] ?? "";
$direccion = $_POST["direccion"] ?? "";
$email = $_POST["email"] ?? "";
$tienda = $_POST["tienda"] ?? "";
if ( isset($_POST["activo"]) ) {
    $activo = 1;
} else {
    $activo = 0;
}
$nombreUsuario = $_POST["nombreUsuario"] ?? "";
$password = $_POST["password"] ?? "";

// Asegurarnos de que el usuario haya echo click en el boton Guardar Actor
try {
    if ( isset($_POST['guardarPersonal']) ) {

        // validar los datos
        if ( empty($nombre) ) {
            throw new Exception("El nombre esta vacio. Favor llenarlo.....");
        }

        if ( empty($apellido) ) {
            throw new Exception("El apellido esta vacio. Favor llenarlo.....");
        }

        if ( empty($direccion) ) {
            throw new Exception("La direccion esta vacia. Favor llenarlo.....");
        }


        if ( empty($email) ) {
            throw new Exception("El correo no puede estar vacio. Favor llenarlo......");
        }

        if ( empty($tienda) ) {
            throw new Exception("La tienda esta vacia. Favor llenarlo.....");
        }

        if ( empty($nombreUsuario) ) {
            throw new Exception("El nombre usuario no puede estar vacio. Favor llenarlo.....");
        }

        if ( empty($password) ) {
            throw new Exception("La contraseña esta vacia. Favor llenarlo.....");
        }


        //Preparar array con los datos//
        $datos = [
            'nombre'        => $nombre,
            'apellido'      => $apellido,
            'direccion'     => $direccion,
            'email'         => $email,
            'tienda'        => $tienda,
            'activo'        => $activo,
            'nombreUsuario' => $nombreUsuario,
            'password'      => $password
        ];

        // insertar los datos
        $personalInsertado = insertarPersonal($conexion, $datos);
        $mensaje = "Los datos del actor se guardaron correctamente";


        // Lanzar un erros si no se Insertaron correctamente
        if ( ! $personalInsertado ) {
            throw  new Exception("Ocurrio un error al insertar los datos del actor");
        }

        // Redireccionar la pagina
        redireccionar("personal.php");

    }
} catch ( Exception $e ) {
    $error = $e->getMessage();
}


$tiendas = obtenerTiendas($conexion);
$direcciones = obtenerDirecciones($conexion);
$infoPersonales = obtenerInfoPersonales($conexion);

// incluir vista

include_once "vistas/vista_personal.php";

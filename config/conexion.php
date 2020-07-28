<?php
// Declarar las constantes de la BD
$ajustes = [
    19 => 2, // devuelve un arrau por low nombres de las columnas de los resultados de la base de datos
    3  => 2 // Nos genera exepciones cuadno hay errores en los querys.
];

define("DB_DRIVER", "mysql");
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "Lamafiawi8492600146");
define("DB_NAME", "sakila");
try {
    $conexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD, $ajustes);
} catch ( PDOException $exception ) {
    throw new Exception("Hubo un error al conectarnos a la base de datos: {Sexception->getMessage()}");
}


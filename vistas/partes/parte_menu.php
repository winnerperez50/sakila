<nav class="nav flex-column">

    <?php

    $paginasMenu = [
        "index"     => [ "Inicio", "fa fa-home" ],
        "actor"     => [ "Actor", "fa fa-user" ],
        "direccion" => [ "Direccion", "fa fa-map-marker-alt" ],
        "ciudad"    => [ "Ciudad", "fa fa-city" ],
        "pais"      => [ "Pais", "fa fa-flag" ],
        "categoria" => [ "Categoria", "fa fa-tag" ],
        "cliente"   => [ "Cliente", "fa fa-user-tag" ],
        "pelicula"  => [ "Pelicula", "fa fa-video" ],
        "idioma"    => [ "Idioma", "fa fa-language" ],
        "personal"  => [ "Personal", "fa fa-users" ],
        "tienda"    => [ "Tienda", "fa fa-store" ]
    ];

    $url = $_SERVER["REQUEST_URI"];
    foreach ( $paginasMenu as $nombreArchivo => $item ) {
        $paginaActual = "";
        if ( strpos($url, $nombreArchivo . ".php") ) {
            $paginaActual = "activo";
        }
        $iciono = $item[1];
        $textoPagina = $item[0];
        echo " <a class=\"nav-link {$paginaActual}\" href=\"{$nombreArchivo}.php\">
        <i class=\"{$iciono}\"></i>
                {$textoPagina}
</a>";
    }


    ?>


</nav>



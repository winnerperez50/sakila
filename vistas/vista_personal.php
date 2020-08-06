<?php include_once "partes/parte_head.php"; ?>

<body>


<!-- Incluyo sakila en la barra superior -->
<?php include_once "modificacion.hp/modifificacion.php";

?>


<!-- Contenido   -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            <?php include_once "partes/parte_menu.php"; ?>
        </div>

        <div class="col-md-10">
            <h3></h3>
            <hr>

            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccion">Direccion</label>
                            <select name="direccion" id="direccion" class="form-select">
                                <option value="">Listado de direcciones</option>
                                <?php

                                foreach ( $direcciones as $direccion ) {
                                    echo "<option value=\"{$direccion["address_id"]}\">{$direccion["address"]}</option>";
                                }

                                ?>
                            </select>
                        </div>




                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="tienda">Tienda:</label>
                            <select name="tienda" id="tienda" class="form-select">
                                <option value="">Selecionar el numero de tiendas</option>
                                <?php

                                foreach ( $tiendas as $tienda ) {
                                    echo "<option value=\"{$tienda["store_id"]}\">{$tienda["store_id"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="activo" id="activo">
                            <label class="form-check-label" for="activo">
                                Activo
                            </label>
                        </div>


                        <div class="mb-3">
                            <label for="nombreUsuario">Nombre de usuario</label>
                            <input type="tel" name="nombreUsuario" id="nombreUsuario" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardarPersonal" class="btn btn-info">Guardar</button>
                        </div>

                    </form>

                    <?php
                    if ( isset($error) ) {
                        echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                {$error}
                                     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                              </button>
                    </div>";
                    }

                    if ( isset($mensaje) ) {
                        echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                                {$mensaje}
                                     <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                              </button>
                      </div>";
                    }

                    ?>

                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tienda</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Nombre Usuario</th>


                        </thead>
                        <tbody>

                        <?php
                        foreach ( $infoPersonales as $infoPersonal ) {
                            if ( $infoPersonal['active'] == 1 ) {
                                $icono = '<i class=\'fas fa-check text-success\'></i>';
                            } else {
                                $icono = '<i class=\'fas fa-times text-danger\'></i>';
                            }

                            echo "<tr>
                                    <th scope=\"row\">{$infoPersonal["staff_id"]}</th>
                                    <td>{$infoPersonal["first_name"]}</td>
                                    <td>{$infoPersonal["last_name"]}</td>
                                    <td>{$infoPersonal["address"]}</td>
                                    <td>{$infoPersonal["email"]}</td>
                                    <td>{$infoPersonal["store_id"]}</td>
                                     <td>
                                   {$infoPersonal['activo']}
                                   {$icono}
                                   </td>
                                    <td>{$infoPersonal["username"]}</td>
                                                                    
                                   
                                </tr>";

                        }


                        ?>
                        </tbody>
                    </table>
                </div>

            </div>


        </div>

    </div>

</div>

<?php include_once "partes/parte_foot.php"; ?>

</body>
</html>
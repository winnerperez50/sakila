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
            <h3><?php echo $nombrePagina ?></h3>

            <hr>

            <div class="row">
                <div class="col-md-5">
                    <form action="" method="post">


                        <div class="mb-3">
                            <label for="tiendas">Tiendas</label>
                            <select name="tiendas" id="tiendas" class="form-select">
                                <option value="">Selecionar el numero de tiendas</option>
                                <?php


                                foreach ( $tiendas as $tienda ) {

                                    if ( $tienda['store_id'] == $tiendas ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$tienda["store_id"]}\">{$tienda["store_id"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" placeholder="Digita tu apellido"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" placeholder="Digita tu apellido"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Digita tu gmail"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccion">Direccion</label>
                            <select name="direccion" id="direccion" class="form-select">
                                <option value="">Listado de direcciones</option>
                                <?php


                                foreach ( $direcciones as $direccion ) {

                                    if ( $direccion['address_id'] == $direccion ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$direccion["address_id"]}\">{$direccion["address"]}</option>";
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
                            <button type="submit" name="guardarCliente" class="btn btn-info">Guardar</button>
                        </div>


                    </form>
                    <?php include_once "partes/partes_mensajes.php"; ?>

                </div>
            </div>
            <hr>

            <?php
            if ( empty($informacionClientes) ) {
                include_once "partes/parte_empty.php";
            } else { ?>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Tienda</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Fecha de creacion</th>
                            </thead>
                            <tbody>

                            <?php
                            foreach ( $informacionClientes as $infoCliente ) {

                                if ( $infoCliente['active'] == 1 ) {
                                    $icono = '<i class=\'fas fa-check text-success\'></i>';
                                } else {
                                    $icono = '<i class=\'fas fa-times text-danger\'></i>';
                                }

                                echo "<tr>
                                    <th scope=\"row\">{$infoCliente["customer_id"]}</th>
                                    <td>{$infoCliente["store_id"]}</td>
                                    <td>" . ucwords(strtolower($infoCliente['name'])) . "</td>
                                    <td>{$infoCliente["email"]}</td>
                                    <td>{$infoCliente["address"]}</td>
                                   <td>
                                   {$infoCliente['activo']}
                                   {$icono}
                                   </td>
                                   <td>{$infoCliente["fecha"]}</td>
                                </tr>";

                            }

                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            <?php } ?>

        </div>

    </div>

</div>

<?php include_once "partes/parte_foot.php"; ?>
</body>
</html>
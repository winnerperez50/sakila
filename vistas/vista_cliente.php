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
                                    echo "<option value=\"{$tienda["store_id"]}\">{$tienda["store_id"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nombre">Nombre</label>
                            <input type="number" name="nombre" id="nombre" placeholder="Digita tu nombre"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="apellido">Apellido</label>
                            <input type="tel" name="apellido" id="apellido" placeholder="Digita tu apellido"
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
                                    echo "<option value=\"{$direccion["address_id"]}\">{$direccion["address"]}</option>";
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
                            <button type="submit" name="guardarDireccion" class="btn btn-info">Guardar</button>
                        </div>


                    </form>
                </div>
            </div>

        </div>

    </div>

</div>


</body>
</html>
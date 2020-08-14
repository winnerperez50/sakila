<?php include_once "partes/parte_head.php"; ?>

<body>


<!-- Incluyo sakila en la barra superior -->
<?php include_once "modificacion.hp/modifificacion.php"; ?>


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
                            <label for="gerentePersonal">Gerente personal</label>

                            <select name="gerentePersonal" id="gerentePersonal" class="form-select">
                                <option value="">Seleccione un gerente</option>
                                <?php

                                foreach ( $personales as $personal ) {

                                    if ( $personal['staff_id'] == $idGerentePersonal ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$personal["staff_id"]}\">{$personal["first_name"]}</option>";
                                }

                                ?>


                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="gerenteDireccion">Direccion</label>
                            <select name="gerenteDireccion" id="gerenteDireccion" class="form-select">
                                <option value="">Listado de direcciones</option>

                                <?php


                                foreach ( $direcciones as $direccion ) {

                                    if ( $direccion['address_id'] == $idGerenteDireccion ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$direccion["address_id"]}\">{$direccion["address"]}</option>";
                                }

                                ?>


                            </select>
                        </div>


                        <div class="mb-3">
                            <button type="submit" name="guardarTienda" class="btn btn-info">Guardar</button>
                        </div>

                    </form>

                    <?php include_once "partes/partes_mensajes.php"; ?>

                </div>
            </div>
            <hr>

            <?php
            if ( empty($informacionTiendas) ) {
                include_once "partes/parte_empty.php";
            } else { ?>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Tienda</th>
                            </thead>
                            <tbody>

                            <?php
                            foreach ( $informacionTiendas as $infoTienda ) {
                                echo "<tr>
                                    <th scope=\"row\">{$infoTienda["store_id"]}</th>
                                    <td>{$infoTienda["first_name"]}</td>
                                    <td>{$infoTienda["address"]}</td>
                                   
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
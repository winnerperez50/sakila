<?php include_once "partes/parte_head.php"; ?>

<body>


<!-- Incluyo sakila en la barra superior -->
<?php include_once "modificacion.hp/modifificacion.php";
include_once "funciones/ayudante.php";
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
                            <label for="gerente">Gerente personal</label>
                            <select name="gerente" id="gerente" class="form-select">
                                <option value="">Seleccione un gerente</option>
                                <?php

                                foreach ( $personales as $personal ) {
                                    echo "<option value=\"{$personal["staff_id"]}\">{$personal["first_name"]}</option>";
                                }

                                ?>


                            </select>
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
                            <button type="submit" name="guardarDireccion" class="btn btn-info">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Nombre</th>
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

        </div>

    </div>

</div>


</body>
</html>
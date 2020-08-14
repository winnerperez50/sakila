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
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="direccion2">Direccion 2</label>
                            <input type="text" name="direccion2" id="direccion2" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="distrito">Distrito</label>
                            <input type="text" name="distrito" id="distrito" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="ciudad">Ciudad</label>
                            <select name="ciudad" id="ciudad" class="form-select">
                                <option value="">Elige una ciudad</option>
                                <?php

                                foreach ( $ciudades as $ciudad ) {

                                    if ( $ciudad['city_id'] == $ciudad ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$ciudad["city_id"]}\">{$ciudad["city"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="codigoPostal">Codigo Postal</label>
                            <input type="number" name="codigoPostal" id="codigoPostal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="telefono">Telefono</label>
                            <input type="tel" name="telefono" id="telefono" class="form-control">
                        </div>


                        <div class="mb-3">
                            <button type="submit" name="guardarDireccion" class="btn btn-info">Guardar</button>
                        </div>

                    </form>

                    <?php include_once "partes/partes_mensajes.php"; ?>


                </div>
            </div>

            <hr>

            <?php
            if ( empty($infoDirecciones) ) {
                include_once "partes/parte_empty.php";
            } else { ?>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Direccion2</th>
                            <th scope="col">Distrito</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Codigo postal</th>
                            <th scope="col">Telefono</th>
                            </thead>
                            <tbody>

                            <?php
                            foreach ( $infoDirecciones as $direccion ) {
                                echo "<tr>
                                    <th scope=\"row\">{$direccion["address_id"]}</th>
                                    <td>{$direccion["address"]}</td>
                                    <td>{$direccion["address2"]}</td>
                                    <td>{$direccion["district"]}</td>
                                    <td>{$direccion["city"]}</td>
                                    <td>{$direccion["postal_code"]}</td>
                                    <td>{$direccion["phone"]}</td>
                                   
                            
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

<?php require_once "partes/parte_foot.php"; ?>

</body>
</html>
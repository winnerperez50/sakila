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
                                    echo "<option value=\"{$ciudad["city_id"]}\">{$ciudad["city"]}</option>";
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
                            <label for="ubicacion">Ubicacion</label>
                            <input type="text" name="ubicacion" id="ubicacion" class="form-control">
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
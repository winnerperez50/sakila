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
                            <label for="titulo">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="lanzamiento">Año de lanzamiento</label>
                            <input type="number" name="lanzamiento" id="lanzamiento" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="idioma">Idioma original:</label>
                            <select name="idioma" id="idioma" class="form-select">
                                <option value="">Elige una ciudad</option>
                                <?php

                                foreach ( $idiomas as $idioma ) {
                                    echo "<option>{$idioma["name"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="idioma">Idiomas</label>
                            <select name="idioma" id="idioma" class="form-select">
                                <option value="">Elige una ciudad</option>
                                <?php

                                foreach ( $idiomas as $idioma ) {
                                    echo "<option>{$idioma["name"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="duracion">Duracion de la renta</label>
                            <input type="number" name="duracion" id="duracion" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="arendamiento">Tasa de arendamiento</label>
                            <input type="text" name="arendamiento" id="arendamiento" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="tamano">Tamaño</label>
                            <input type="text" name="tamano" id="tamano" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="costo">Costo de reemplazo</label>
                            <input type="text" name="costo" id="costo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="clasificacion">Clasificacion</label>
                            <input type="text" name="clasificacion" id="clasificacion" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="especiales">Caracteristicas especiales</label>
                            <input type="text" name="especiales" id="especiales" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar" class="btn btn-info">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>

    </div>

</div>


</body>
</html>
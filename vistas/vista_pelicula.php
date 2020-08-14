<?php include_once "partes/parte_head.php"; ?>

<body

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
                            <label for="titulo">Titulo</label>
                            <input type="text" name="titulo" id="titulo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control">
                        </div>


                        <div class="mb-3">
                            <label for="anoLanzamiento" class="form-label">Año de lanzmiento</label>
                            <input class="form-control" list="listadoAnios" name="anoLanzamiento" id="anoLanzamiento"
                                   placeholder="Elige o digita el año de lanzamiento">
                            <datalist id="listadoAnios">
                                <?php

                                for ( $year = date("Y"); $year >= 1900; $year-- ) {
                                    echo "<option value=\"{$year}\">";
                                }

                                ?>
                            </datalist>
                        </div>


                        <div class="mb-3">
                            <label for="idioma">Idioma original:</label>
                            <select name="idioma" id="idioma" class="form-select">
                                <option value="">Elige un idioma</option>
                                <?php

                                foreach ( $idiomas as $idioma ) {

                                    if ( $idioma['language_id'] == $idIdioma ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$idioma["language_id"]}\">{$idioma["name"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="idioma2">Idiomas</label>
                            <select name="idioma2" id="idioma2" class="form-select">
                                <option value="">Elige un idioma</option>
                                <?php

                                foreach ( $idiomas as $idioma ) {

                                    if ( $idioma['language_id'] == $idIdioma2 ) {
                                        $seleccionado = "selected";
                                    } else {
                                        $seleccionado = "";
                                    }

                                    echo "<option {$seleccionado} value=\"{$idioma["language_id"]}\">{$idioma["name"]}</option>";
                                }

                                ?>


                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="duracion">Duracion de la renta</label>
                            <input type="number" name="duracion" id="duracion" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="arrendamiento">Tasa de arendamiento</label>
                            <input type="text" name="arrendamiento" id="arrendamiento" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="tamano">Tamaño</label>
                            <input type="text" name="tamano" id="tamano" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="reemplazo">Costo de reemplazo</label>
                            <input type="text" name="reemplazo" id="reemplazo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="clasificacion">Rating</label>
                            <select name="clasificacion" id="clasificacion" class="form-select">
                                <option value="">Elige un rating</option>
                                <?php

                                $ratings = [ 'G', 'PG', 'PG-13', 'R', 'NC-17' ];

                                foreach ( $ratings as $rating ) {
                                    echo " <option value=\"{$rating}\">{$rating}</option>";
                                }

                                ?>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="caracteristicasEspeciales">Caracteristicas especiales</label>
                            <select name="caracteristicasEspeciales[]" id="caracteristicasEspeciales"
                                    class="form-select"
                                    multiple>
                                <option value="">Elige una o mas caracteristicas especiales</option>
                                <?php

                                $caracteristicas = [ 'trailers', 'comentaries', 'deleted scenes', 'behind the scenes' ];

                                foreach ( $caracteristicas as $caracteristica ) {
                                    echo " <option value=\"{$caracteristica}\">{$caracteristica}</option>";
                                }

                                ?>
                            </select>

                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardarPelicula" class="btn btn-info">Guardar</button>
                        </div>

                    </form>

                    <?php include_once "partes/partes_mensajes.php"; ?>

                </div>
            </div>

            <hr>
            <?php
            if ( empty($infoPeliculas) ) {
                include_once "partes/parte_empty.php";
            } else { ?>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <th scope="col">Id pelicula</th>
                            <th scope="col">titulo</th>
                            <th scope="col">Año lanzamiento</th>
                            <th scope="col">Idioma original</th>
                            <th scope="col">Otro idioma</th>
                            <th scope="col">Duracion de alquiler</th>
                            <th scope="col">Tasa de arrendamiento</th>
                            <th scope="col">Tamaño</th>
                            <th scope="col">Costo de reemplazo</th>
                            <th scope="col">Clasificacion</th>
                            <th scope="col">Caracteristicas especiales</th>


                            </thead>
                            <tbody>

                            <?php
                            foreach ( $infoPeliculas as $infoPelicula ) {
                                echo "<tr>
                                    <th scope=\"row\">{$infoPelicula["film_id"]}</th>
                                    <td>{$infoPelicula["title"]}</td>
                                    <td>{$infoPelicula["description"]}</td>
                                    <td>{$infoPelicula["release_year"]}</td>
                                    <td>{$infoPelicula["idioma_oficial"]}</td>
                                    <td>{$infoPelicula["rental_rate"]}</td>
                                   <td>{$infoPelicula["length"]}</td>
                                    <td>{$infoPelicula["replacement_cost"]}</td>
                                    <td>{$infoPelicula["rating"]}</td>                                                                                         
                                    <td>{$infoPelicula["special_features"]}</td>
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
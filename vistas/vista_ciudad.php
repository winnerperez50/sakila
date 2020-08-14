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

                        <input type="hidden" name="idCiudad" value="<?= $idCiudad ?>">

                        <div class="mb-3">
                            <label for="nombreCiudad">Nombre de la ciudad</label>
                            <input type="text" name="nombreCiudad" id="nombreCiudad" placeholder="digita una ciudad"
                                   class="form-control" value="<?= $nombreCiudad ?>">
                        </div>

                        <div class="mb-3">
                            <label for="pais">Pais</label>

                            <?php if ( empty($paises) ) { ?>
                                <div class="form-label"><i class="fas fa-info-circle"></i> No hay paises registrados
                                </div>
                            <?php } else { ?>
                                <select name="pais" id="pais" class="form-select">
                                    <option value="">Elige un pais</option>
                                    <?php

                                    foreach ( $paises as $pais ) {

                                        if ( $pais['country_id'] == $idPais ) {
                                            $seleccionado = "selected";
                                        } else {
                                            $seleccionado = "";
                                        }
                                        echo "<option {$seleccionado} value=\"{$pais["country_id"]}\">{$pais["country"]}</option>";

                                    }
                                    ?>

                                </select>

                            <?php } ?>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_ciudad" class="btn btn-info">Guardar</button>
                        </div>
                    </form>


                    <?php include_once "partes/partes_mensajes.php"; ?>

                </div>
            </div>
            <hr>

            <?php
            if (empty($ciudades)) {
                include_once "partes/parte_empty.php";
            } else { ?>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                            <th scope="col">ID Ciudad</th>
                            <th scope="col">Nombre Ciudad</th>
                            <th scope="col">Nombre Pais</th>
                            <th>Acciones</th>
                            </thead>
                            <tbody>

                            <?php
                            foreach ( $ciudades as $ciudad ) {
                                echo "<tr>
                                                        <th scope=\"row\">{$ciudad["city_id"]}</th>
                                                        <td>{$ciudad["city"]}</td>
                                                        <td>{$ciudad["country"]}</td>
                                                        <td>
                                                        
                                                        <button class='btn btn-outline-danger btn-sm' title='Eliminar ciudad' name='eliminarCiudad' value='{$ciudad['city_id']}'><i class='fas fa-trash'></i></button>
                                                        <button class='btn btn-outline-info btn-sm' title='Editar ciudad' name='editarCiudad' value='{$ciudad['city_id']}'> <i class='fas fa-pen'></i> </button>
                                                        </td>
                                                       
                                                    </tr>";

                            }

                            ?>
                            </tbody>
                        </table>
                    </form>
                </div>

                <?php } ?>

            </div>

        </div>

    </div>

    <?php include_once "partes/parte_foot.php"; ?>
</body>
</html>
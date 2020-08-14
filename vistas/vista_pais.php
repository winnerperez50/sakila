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
                        <input type="hidden" name="idPais" value="<?= $idPais ?>">

                        <div class="mb-3">
                            <label for="nombrePais">Pais</label>
                            <input type="text" name="nombrePais" id="nombrePais"
                                   class="form-control" value="<?= $nombrePais ?>">
                        </div>


                        <div class="mb-3">
                            <button type="submit" name="guardarPais" class="btn btn-info">Guardar</button>
                        </div>

                    </form>

                    <?php include_once "partes/partes_mensajes.php"; ?>


                </div>
            </div>
            <hr>

            <?php
            if (empty($paises)) {
                include_once "partes/parte_empty.php";
            } else { ?>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                            <th scope="col">ID</th>
                            <th scope="col">Pais</th>
                            <th>Acciones</th>

                            </thead>
                            <tbody>

                            <?php
                            foreach ( $paises as $pais ) {
                                echo "<tr>
                                    <th scope=\"row\">{$pais["country_id"]}</th>
                                    <td>{$pais["country"]}</td>
                                   <td>                                    
                                    <button class='btn btn-outline-danger btn-sm' title='Eliminar pais' name='eliminarPais' value='{$pais['country_id']}'><i class='fas fa-trash'></i></button>
                                    <button class='btn btn-outline-info btn-sm' title='Editar pais' name='editarPais' value='{$pais['country_id']}'> <i class='fas fa-pen'></i> </button>
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

</div>

<?php include_once "partes/parte_foot.php"; ?>
</body>
</html>
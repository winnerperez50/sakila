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
                        <input type="hidden" name="idCategoria" value="<?= $idCategoria ?>">

                        <div class="mb-3">
                            <label for="nombreCategoria">Categorias</label>
                            <input type="text" name="nombreCategoria" id="nombreCategoria"
                                   class="form-control" value="<?= $nombreCategoria ?>">
                        </div>


                        <div class="mb-3">
                            <button type="submit" name="guardarCategorias" class="btn btn-info">Guardar</button>
                        </div>

                    </form>

                    <?php include_once "partes/partes_mensajes.php"; ?>

                </div>
            </div>
            <hr>

            <?php
            if (empty($categorias)) {
                include_once "partes/parte_empty.php";
            } else { ?>

            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="table">
                            <thead>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th>Acciones</th>

                            </thead>
                            <tbody>

                            <?php
                            foreach ( $categorias as $categoria ) {
                                echo "<tr>
                                    <th scope=\"row\">{$categoria["category_id"]}</th>
                                    <td>{$categoria["name"]}</td>
                                    <td>
                                    <button class='btn btn-outline-danger btn-sm' title='Eliminar categoria' name='eliminarCategoria' value='{$categoria['category_id']}'><i class='fas fa-trash'></i></button>
                                    <button class='btn btn-outline-info btn-sm' title='Editar categoria' name='editarCategoria' value='{$categoria['category_id']}'> <i class='fas fa-pen'></i> </button>
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
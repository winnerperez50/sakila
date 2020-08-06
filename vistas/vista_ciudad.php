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
                            <label for="nombreCiudad">Nombre de la ciudad</label>
                            <input type="text" name="nombreCiudad" id="nombreCiudad" placeholder="digita una ciudad"
                                   class="form-control" value="<?= $nombreCiudad ?>">
                        </div>

                        <div class="mb-3">
                            <label for="pais">Pais</label>
                            <select name="pais" id="pais" class="form-select">
                                <option value="">Elige un pais</option>
                                <?php

                                foreach ( $paises as $pais ) {
                                    echo "<option value=\"{$pais["country_id"]}\">{$pais["country"]}</option>";

                                }
                                ?>

                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="guardar_ciudad" class="btn btn-info">Guardar</button>
                        </div>
                    </form>


                    <?php
                    if ( isset($error) ) {
                        echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                                    {$error}
                                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                  </button>
                        </div>";
                    }

                    if ( isset($mensaje) ) {
                        echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                                    {$mensaje}
                                         <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                  </button>
                          </div>";
                    }

                    ?>

                </div>
            </div>
            <hr>

            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <th scope="col">ID Ciudad</th>
                        <th scope="col">Nombre Ciudad</th>
                        <th scope="col">Nombre Pais</th>
                        </thead>
                        <tbody>

                        <?php
                        foreach ( $ciudades as $ciudad ) {
                            echo "<tr>
                                    <th scope=\"row\">{$ciudad["city_id"]}</th>
                                    <td>{$ciudad["city"]}</td>
                                    <td>{$ciudad["country"]}</td>
                                   
                                </tr>";

                        }

                        ?>
                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>

    <?php include_once "partes/parte_foot.php"; ?>
</body>
</html>
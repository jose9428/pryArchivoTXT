<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container mt-3">
            <?php
            include './layout/template.php';
            include './control/ModelEmpleado.php';
            ?>

            <form method="post" class="text-center border border-light p-5" action="control/ControlEmpleado.php" style="width: 60%;margin: auto;">
                <p class="h4 mb-4">Registro Empleado</p>
                <input type="text" name="dni" class="form-control mb-4" placeholder="Ingrese DNI" maxlength="8">

                <input type="text" name="nombre" class="form-control mb-4" placeholder="Ingrese nombre">
                <input type="number" name="sueldo" class="form-control mb-4" placeholder="Ingrese sueldo">
                <input type="hidden" name="accion" value="agregar">
                <button class="btn btn-info btn-block my-4" type="submit">Registrar</button>
            </form>

            <br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Sueldo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $obj = new ModelEmpleado();
                    $obj->setNombreArchivo("./archivo/empleados.txt");
                    $array = $obj->CargarArchivo();

                    foreach ($array as $key => $data) {
                        ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $data["dni"] ?></td>
                            <td><?= $data["nombre"] ?></td>
                            <td><?= $data["sueldo"] ?></td>
                            <td>
                                <a href="./control/ControlEmpleado.php?accion=eliminar&ind=<?= $key ?>" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    <?php
                    if (empty($array)) {
                        ?>
                        <tr>
                            <td class="text-center" colspan="4">No se encontraron datos</td>
                        </tr>
                            <?php
                    }
                    ?>
                </tbody>
            </table>    
        </div>

    </body>
</html>

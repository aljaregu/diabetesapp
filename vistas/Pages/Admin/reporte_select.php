<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>

<?php include '../header.php'; ?>
<div class="container is-fluid">

    <br>
    <h1>Lista de usuarios</h1>
    <br>

    <br>
    </form>
    <table class="table table-striped table-dark " id="table_id">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Seleccionar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
            $SQL = "SELECT user.id, user.nombre FROM user WHERE user.rol = 3";
            $dato = mysqli_query($conexion, $SQL);
            if ($dato->num_rows > 0) {
                while ($fila = mysqli_fetch_array($dato)) {
                    ?>
                    <tr>
                        <td>
                            <?php echo $fila['nombre']; ?>
                        </td>
                        <td>
                            <a href="./reportes.php?id=<?php echo $fila['id'] ?>" class="btn btn-success"><i class="fa fa-check"></i></a>
                        </td>
                    </tr>
                    <?php
                }
            } else {

                ?>
                <tr class="text-center">
                    <td colspan="16">No existen registros</td>
                </tr>


                <?php

            }

            ?>


            </body>
    </table>

</html>
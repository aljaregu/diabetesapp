<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id_doc = $_SESSION['id'];
if ($validar == null || $validar = '') {
  header("Location: http://localhost/r_user/includes/login.php");
  die();
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Diab-Help</title>
</head>

<body>

<?php
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
    $SQL = "SELECT * FROM seguimiento WHERE id_user = $id_doc";
    $dato = mysqli_query($conexion, $SQL);
    ?>

    <div>
        <div>
            <h1>SEGUIMIENTO</h1>
            <div class="container">
                <?php if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {
                        ?>
                            <p>Fecha: <?php echo $fila['fecha'] ?></p>
                            <p>Hora: <?php echo $fila['hora'] ?></p>
                            <p>Médico: <?php echo $fila['medico'] ?></p>
                            <p>Descripción: <?php echo $fila['descripcion'] ?></p>
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
            </div>
        </div>
    </div>
</body>

</html>
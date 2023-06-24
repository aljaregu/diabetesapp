<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id = $_SESSION['id'];
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
    <title>Diab-Help</title>
    <!-- CSS PERFIL -->
</head>

<body>

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
    $SQL = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
    user.fecha, user.estado, permisos.rol FROM user
    LEFT JOIN permisos ON user.rol = permisos.id WHERE user.id = $id";
    $dato = mysqli_query($conexion, $SQL);
    ?>

    <div>
        <div>
            <h1>TU PERFIL</h1>
            <div class="container">
                <?php if ($dato->num_rows > 0) {
                    while ($fila = mysqli_fetch_array($dato)) {
                        ?>
                        <p>Nombre: <?php echo $fila['nombre'] ?></p>
                        <p>Correo: <?php echo $fila['correo'] ?></p>
                        <p>Contraseña: <?php echo $fila['password'] ?></p>
                        <p>Rol: <?php echo $fila['rol'] ?></p>
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
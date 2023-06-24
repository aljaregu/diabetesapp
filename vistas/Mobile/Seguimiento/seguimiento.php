<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id = $_SESSION['id'];
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
    <!-- CCS BOOTSTRAP 5 -->
    <link rel="stylesheet" href="../../../Assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <!-- CSS PERSONALIZADO -->
    <link rel="stylesheet" href="../../../Assets/css/general.css">
    <link rel="stylesheet" href="../../../Assets/css/navbar.css">
    <link rel="stylesheet" href="../../../Assets/css/segui_d.css" />
</head>

<body>
    <!-- NAVEGACION NAVBAR -->
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="../Inicio/inicio.php"><img src="../../../Assets/images/iconos/Logo_diab.png" alt=""></a>
            </div>
            <ul class="links mb-0 px-0">
                <li><a href="../Inicio/inicio.php">Inicio</a></li>
                <li><a href="./seguimiento.php">Seguimiento</a></li>
                <li><a href="../Plan_ali/plan_ali.php">Plan Alimenticio</a></li>
                <li><a href="../Reporte/reporte.php">Reporte</a></li>
                <li><a href="../Perfil/perfil.php">Perfil</a></li>
            </ul>
            <a href="../../../index.php" class="action_btn">Cerrar Sesión</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <!-- MENU RESPONSIVE -->
        <div class="dropdown_menu">
            <li><a href="../Inicio/inicio.php">Inicio</a></li>
            <li><a href="./seguimiento.php">Seguimiento</a></li>
            <li><a href="../Plan_ali/plan_ali.php">Plan Alimenticio</a></li>
            <li><a href="../Reporte/reporte.php">Reporte</a></li>
            <li><a href="../Perfil/perfil.php">Perfil</a></li>
            <li><a href="../../../index.php" class="action_btn">Cerrar Sesión</a></li>
        </div>
    </header>

    <!-- SECCION DE NOTIFICACIONES DE CITA -->
    <section>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
        $SQL = "SELECT * FROM seguimiento WHERE id_pac = $id";
        $dato = mysqli_query($conexion, $SQL); ?>
        <div class="container">
            <?php if ($dato->num_rows > 0) {
                while ($fila = mysqli_fetch_array($dato)) { ?>
                    <h3>Tienes una cita para el dia: </h3>
                    <hr>
                    <div class="cita">
                        <div class="datos-cita">
                            <p>Fecha: <?php echo $fila['fecha'] ?> </p>
                            <p>Hora: <?php echo $fila['hora'] ?> </p>
                            <p>Médico: <?php echo $fila['medico'] ?> </p>
                        </div>
                        <div class="des-cita">
                            <p>Descripción: <?php echo $fila['descripcion'] ?> </p>
                        </div>
                    </div>
                <?php }
            } else { ?>
                <tr class="text-center">
                    <td colspan="16">No existen registros</td>
                </tr>
            <?php } ?>
        </div>
    </section>

    <!-- DIRECCION DE ARCHIVOS JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
    <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
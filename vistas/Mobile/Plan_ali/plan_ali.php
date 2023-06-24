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
    <link rel="stylesheet" href="../../../Assets/css/general.css" />
    <link rel="stylesheet" href="../../../Assets/css/navbar.css" />
    <link rel="stylesheet" href="../../../Assets/css/plan_ados.css" />
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
                <li><a href="../Seguimiento/seguimiento.php">Seguimiento</a></li>
                <li><a href="./plan_ali.php">Plan Alimenticio</a></li>
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
            <li><a href="../Seguimiento/seguimiento.php">Seguimiento</a></li>
            <li><a href="./plan_ali.php">Plan Alimenticio</a></li>
            <li><a href="../Reporte/reporte.php">Reporte</a></li>
            <li><a href="../Perfil/perfil.php">Perfil</a></li>
            <li><a href="../../../index.php" class="action_btn">Cerrar Sesión</a></li>
        </div>
    </header>

    <!-- LISTA ACORDEON PARA PLANES ALIMENTICIOS -->
    <section>
        <?php
        $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
        $SQL = "SELECT * FROM plan_alimenticio WHERE id_pac = $id";
        $dato = mysqli_query($conexion, $SQL); ?>
        <div class="container">
            <?php if ($dato->num_rows > 0) {
                while ($fila = mysqli_fetch_array($dato)) { ?>
                    <div class="div-plan">
                        <h2>El/la doctor te envía el siguiente plan alimenticio: </h2>
                        <div class="linea"></div>
                        <p> <?php echo $fila['descripcion'] ?> </p>
                    </div>
                <?php }
            } else { ?>
                <tr class="text-center">
                    <td colspan="16">No existen registros</td>
                </tr> <?php
            } ?>
        </div>
    </section>

    <!-- DIRECCION DE ARCHIVOS JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
    <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
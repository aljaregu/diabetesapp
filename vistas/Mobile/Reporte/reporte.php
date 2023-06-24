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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports</title>
    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="../../../Assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <!-- ESTILOS PERSONALIZADOS -->
    <link rel="stylesheet" href="../../../Assets/css/general.css">
    <link rel="stylesheet" href="../../../Assets/css/navbar.css">
    <link rel="stylesheet" href="../../../Assets/css/report_view.css">
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
                <li><a href="../Plan_ali/plan_ali.php">Plan Alimenticio</a></li>
                <li><a href="./reporte.php">Reporte</a></li>
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
            <li><a href="../Plan_ali/plan_ali.php">Plan Alimenticio</a></li>
            <li><a href="./reporte.php">Reporte</a></li>
            <li><a href="../Perfil/perfil.php">Perfil</a></li>
            <li><a href="../../../index.php" class="action_btn">Cerrar Sesión</a></li>
        </div>
    </header>

    <!-- REPORTES MOVIL -->
    <section>
        <div class="motivation">
            <img src="../../../Assets/images/folders.png" alt="Sticker">
            <div class="frase">
                <img src="../../../Assets/images/Eyes.png" alt="Ojo">
                <h2>Atento a los reportes</h2>
                <p>Ver tu avance es muy bueno para el tratamiento</p>
            </div>
        </div>
    </section>

    <!-- SECCION DE VISTA DE PDF'S -->
    <?php
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
    $SQL = "SELECT * FROM reportes WHERE id_paciente = $id";
    $dato = mysqli_query($conexion, $SQL); ?>

    <section class="sec-pdf">
        <?php if ($dato->num_rows > 0) {
            while ($fila = mysqli_fetch_array($dato)) { ?>
                <div class="container-reports">
                    <div class="imageContainer">
                        <img class="image" src="../../../Assets/images/doc_pdf.jpg" alt="Report Image" />
                    </div>
                    <div class="button-ver">
                        <a href="reporte_fpdf.php?id=<?php echo $fila['id'] ?>">
                            <button>VER</button>
                        </a>
                    </div>
                    <div class="details">
                        <p>Paciente:
                            <?php echo $fila['paciente'] ?>
                        </p>
                        <p>Fecha:
                            <?php echo $fila['fecha'] ?>
                        </p>
                        <p>Hora:
                            <?php echo $fila['hora'] ?>
                        </p>
                        <p>Médico:
                            <?php echo $fila['doctor'] ?>
                        </p>
                    </div>
                </div>
            <?php }
        } else { ?>
            <tr class="text-center">
                <td colspan="16">No existen registros</td>
            </tr> <?php
        } ?>
    </section>

    <!-- DIRECCION DE ARCHIVOS JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
    <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
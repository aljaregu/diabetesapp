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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diab-Help</title>
    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="../../../Assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <!-- CSS PERSONALIZADO -->
    <link rel="stylesheet" href="../../../Assets/css/general.css">
    <link rel="stylesheet" href="../../../Assets/css/doctor_d.css">
    <link rel="stylesheet" href="../../../Assets/css/nav_doc.css">
</head>

<body>
    <!-- NAVEGACION NAVBAR -->
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="./doctor.php"><img src="../../../Assets/images/iconos/Logo_diab.png" alt="Logo Diab-Help"></a>
            </div>
            <ul class="links mb-0 px-0">
                <li><a href="./doctor.php">Home</a></li>
                <li><a href="./reportes.php">Reportes</a></li>
                <li><a href="./profile.php">Perfil de Doctor</a></li>
                <li><a href="./admin.php">Usuarios</a></li>
            </ul>
            <a href="../../../index.php" class="action_btn">Cerrar Sesión</a>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <!-- MENU RESPONSIVE -->
        <div class="dropdown_menu">
            <li><a href="./doctor.php">Home</a></li>
            <li><a href="./reportes.php">Reportes</a></li>
            <li><a href="./profile.php">Perfil de Doctor</a></li>
            <li><a href="./admin.php">Usuarios</a></li>
            <li><a href="../../../index.php" class="action_btn">Cerrar Sesión</a></li>
        </div>
    </header>

    <!-- SECCION DE LA VISTA HOME - DOCTOS (CARDS) -->
    <section>
        <div class='card-home'>
            <img src="../../../Assets/images/iconos/Paciente.svg" alt="Pacientes" />
            <a href="./pacientes.php" class="a-btn">Pacientes</a>
            <p>En esta seccion tienes la lista de todos tus pacientes.</p>
        </div>
        <div class='card-home'>
            <img src="../../../Assets/images/iconos/Seguimiento.svg" alt="Seguimiento" />
            <button type="button" class="btn btn-docs" data-bs-toggle="modal" data-bs-target="#seguiModal">
                Seguimiento
            </button>
            <p>En esta seccion puedes agendar una cita con tus pacientes.</p>
        </div>
        <div class='card-home'>
            <img src="../../../Assets/images/iconos/Add_pac.svg" alt="Añadir Paciente" />
            <button type="button" class="btn btn-docs" data-bs-toggle="modal" data-bs-target="#planModal">
                Plan Alimenticio
            </button>
            <p>En esta seccion puedes añadir a tus nuevos pacientes.</p>
        </div>
    </section>

    <!-- MODALES PARA LAS SECCIONES -->
    <!-- MODAL DE SEGUIMIENTO -->
    <div class="modal fade" id="seguiModal" tabindex="-1" aria-labelledby="seguiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-seg">
                <div class="modal-header mod-hseg">
                    <h1 class="modal-title fs-5" id="seguiModalLabel">Generador de seguimiento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="modal-form" action="../../../includes/_functions.php" method="POST">
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
                    $SQL = "SELECT * FROM user WHERE rol = 3 AND id_doc = $id_doc";
                    $dato = mysqli_query($conexion, $SQL); ?>
                    <div class="modal-body">
                        <select class="form-select" type="text" id="id" name="id">
                            <?php if ($dato->num_rows > 0) {
                                while ($fila = mysqli_fetch_array($dato)) {
                                    ?>
                                    <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?></option>
                                    <?php
                                }
                            } else {
                                ?>
                                <option value="">No Existen Pacientes</option>
                                <?php
                            } ?>
                        </select>
                        <div class="inputs-f">
                            <label for="fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha" required>
                        </div>
                        <div class="inputs-f">
                            <label for="hora">Hora:</label>
                            <input type="time" id="hora" name="hora" required>
                        </div>
                        <div class="inputs-f">
                            <label for="medico">Médico:</label>
                            <input type="text" id="medico" name="medico" required>
                        </div>
                        <div class="inputs-f">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" id="descripcion" name="descripcion" required>
                            <input type="hidden" name="accion" value="generar_seguimiento">
                            <input type="hidden" name="id_doc" value="<?php echo $id_doc ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-seg">Generar cita</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- MODAL DE PLAN ALIMENTICIO -->
    <div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-pa">
                <div class="modal-header mod-hpa">
                    <h1 class="modal-title fs-5" id="planModalLabel">Generador de plan alimenticio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="modal-form" action="../../../includes/_functions.php" method="POST">
                        <?php
                        $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
                        $SQL = "SELECT * FROM user WHERE rol = 3 AND id_doc = $id_doc";
                        $dato = mysqli_query($conexion, $SQL);
                        ?>
                        <div class="modal-body">
                            <select class="form-select" type="text" id="id" name="id">
                                <?php if ($dato->num_rows > 0) {
                                    while ($fila = mysqli_fetch_array($dato)) {
                                        ?>
                                        <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?></option>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <option value="">No Existen Pacientes</option>
                                    <?php
                                } ?>
                            </select>
                            <div class="inputs-f">
                                <label for="descripcion">Seleccione el plan alimenticio: </label>
                                <textarea rows="7" id="descripcion" name="descripcion" required></textarea>
                                <input type="hidden" name="accion" value="generar_plan">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-pa">Generar plan alimenticio</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- DIRECCION DE ARCHIVOS JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
    <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
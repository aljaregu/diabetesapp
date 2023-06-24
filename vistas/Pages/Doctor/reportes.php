<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id_doc = $_SESSION['id'];
if ($validar == null || $validar = '') {
    header("Location: http://localhost/r_user/includes/login.php");
    die();
}?>
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
    <link rel="stylesheet" href="../../../Assets/css/nav_supd.css">
    <link rel="stylesheet" href="../../../Assets/css/reporte.css">
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

        <div class="dropdown_menu">
            <li><a href="./doctor.php">Home</a></li>
            <li><a href="./reportes.php">Reportes</a></li>
            <li><a href="./profile.php">Perfil de Doctor</a></li>
            <li><a href="./admin.php">Usuarios</a></li>
            <li><a href="../../../index.php" class="action_btn">Cerrar Sesión</a></li>
        </div>
    </header>

    <!-- SECCION PARA EL FORMULARIO DE REPORTES -->
    <section>
        <div class="container-page">
            <div class="input-container">
                <input type="hidden" name="accion" value="generar_reporte">
                <input type="hidden" name="id_doctor" value="<?php echo $id ?>">
                <input type="hidden" name="id_paciente" value="<?php echo $_GET['id'] ?>">
            </div>
            <div class="container-all">
                <form action="../../../includes/_functions.php" method="POST">
                    <div class="container">
                        <div class="information-container">
                            <div class="title2">
                                <h2>Datos:</h2>
                            </div>
                            <div class="information">
                                <div>
                                    <label for="doctor">Doctor:</label>
                                    <?php
                                    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
                                    $SQL = "SELECT * FROM user WHERE id = $id_doc";
                                    $dato = mysqli_query($conexion, $SQL);
                                    ?>

                                    <div class="modal-body">

                                        <select class="form-select" type="text" id="id" name="id" disabled>
                                            <?php if ($dato->num_rows > 0) {
                                                while ($fila = mysqli_fetch_array($dato)) {
                                                    ?>
                                                    <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <option value="">No Existen Pacientes</option>
                                                <?php
                                            } ?>
                                        </select>
                                        <label for="doctor">Paciente:</label>


                                        <?php
                                        $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
                                        $SQL = "SELECT * FROM user WHERE rol = 3 AND id_doc = $id_doc";
                                        $dato = mysqli_query($conexion, $SQL);
                                        ?>

                                        <div class="modal-body">

                                            <select class="form-select" type="text" id="id_pac" name="id_pac">
                                                <?php if ($dato->num_rows > 0) {
                                                    while ($fila = mysqli_fetch_array($dato)) {
                                                        ?>
                                                        <option value="<?php echo $fila['id'] ?>"><?php echo $fila['nombre'] ?>
                                                        </option>

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <option value="">No Existen Pacientes</option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>


                                        <div>
                                            <label for="edad">Edad:</label>
                                            <input type="number" id="edad" name="edad" required><br>

                                        </div>
                                        <div>
                                            <label for="fecha">Fecha:</label>
                                            <input type="date" id="fecha" name="fecha" required><br>
                                        </div>
                                        <div>
                                            <label for="hora">Hora:</label>
                                            <input type="time" id="hora" name="hora" required><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="miscelaneos-container">
                            <div class="title3">
                                <h2>Misceláneos:</h2>
                            </div>
                            <div class="miscelaneos-column">

                            </div>
                            <div class="miscelaneos">
                                <div>
                                    <label for="glicemia">Glicemia: (70-110)mg/dl</label>
                                    <input type="number" id="glicemia" name="glicemia" required><br>

                                    <label for="hbglicosilada">% Hb Glicosilada:</label>
                                    <input type="number" id="hbglicosilada" name="hbglicosilada" required><br>
                                    <label for="NUS">NUS: (3-20) mg/dl</label>
                                    <input type="text" id="NUS" name="NUS" required><br>

                                    <label for="urea">Urea: (13-43) mg/dl</label>
                                    <input type="number" id="urea" name="urea" required><br>
                                </div>
                                <div>
                                    <label for="creatinina">Creatinina: (0.6-1.3) mg/dl</label>
                                    <input type="number" id="creatinina" name="creatinina" required><br>

                                    <label for="acidoUrico">Ácido Úrico: (M: 2.5-6.0, V: 1.5-7.2) mg/dl</label>
                                    <input type="number" id="acidoUrico" name="acidoUrico" required><br>
                                    <label for="calcio">Calcio: (8.8-11) mg/dl</label>
                                    <input type="number" id="calcio" name="calcio" required><br>

                                    <label for="fosforo">Fósforo: (2.5-5.0) mg/dl</label>
                                    <input type="number" id="fosforo" name="fosforo" required><br>
                                </div>

                                <div>
                                    <label for="colesterol">Colesterol: (menor a 200) mg/dl</label>
                                    <input type="number" id="colesterol" name="colesterol" required><br>

                                    <label for="trigliceridos">Triglicéridos: (menor a 150) mg/dl</label>
                                    <input type="number" id="trigliceridos" name="trigliceridos" required><br>
                                    <label for="gdl">GDL: (35-65) mg/dl</label>
                                    <input type="number" id="gdl" name="gdl" required><br>

                                    <label for="ldl">LDL: (menor a 150) mg/dl</label>
                                    <input type="number" id="ldl" name="ldl" required><br>
                                </div>

                                <div>
                                    <label for="proteinasTotales">Proteínas Totales: (6.4-8.3) g/dl</label>
                                    <input type="number" id="proteinasTotales" name="proteinasTotales" required>

                                    <label for="albumina">Albumina: (3.4-4.8) g/dl</label>
                                    <input type="number" id="albumina" name="albumina" required><br>
                                    <label for="magnesio">Magnesio: (1.6-2.6) mg/dl</label>
                                    <input type="number" id="magnesio" name="magnesio" required><br>

                                    <label for="nota">Nota:</label>
                                    <input type="number" id="nota" name="nota" required><br>
                                </div>
                            </div>
                            <div class="notafinal">
                                <h3>Considera que al enviar el reporte estas introduciendo los datos del
                                    paciente
                                    correctamente</h3>
                            </div>

                            <input type="submit" value="Generar Reporte">

                            <input type="hidden" name="accion" value="generar_reporte">
                            <input type="hidden" name="id_doctor" value="<?php echo $id_doc ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- SCRIPTS JAVASCRIPT -->
    <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
    <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
    <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
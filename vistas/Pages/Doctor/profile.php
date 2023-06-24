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
  <link rel="stylesheet" href="../../../Assets/css/nav_sup.css">
  <link rel="stylesheet" href="../../../Assets/css/perfil_d.css">
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

  <!-- SECCION PRINCIPAL PERFIL - PACIENTE -->
  <section>
    <div class="motivation">
      <img src="../../../Assets/images/doctor.png" alt="Sticker">
      <div class="frase">
        <h2>Hola Doctor, ¿Como va su jornada?</h2>
        <p>¿Necesita algunos datos?</p>
      </div>
    </div>
    <div class="profile">
      <img src="../../../Assets/images/iconos/Perfil_doc.jpeg" alt="Foto de perfil">

      <?php
      $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
      $SQL = "SELECT * FROM user WHERE id = $id_doc";
      $dato = mysqli_query($conexion, $SQL);
      ?>


      <?php if ($dato->num_rows > 0) {
        while ($fila = mysqli_fetch_array($dato)) {
          ?>
          <div class="data-paciente">
            <label>Doctor: </label>
            <p><?php echo $fila['nombre']?></p>
            <label>Correo: </label>
            <p><?php echo $fila['correo']?></p>
            <label>Contraseña: (Cuida tu información)</label>
            <p><?php echo $fila['password']?></p>
            
          </div>

          <?php
        }
      } else {
        ?>
        <h1>No Existen Registros</h1>
        <?php
      }

      ?>





    </div>
  </section>

  <!-- SCRIPTS JAVASCRIPT -->
  <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
  <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
  <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
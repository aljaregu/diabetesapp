<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DiabHelp</title>
  <!-- CCS BOOTSTRAP 5 -->
  <link rel="stylesheet" href="../../../Assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
  <!-- CSS PERSONALIZADO -->
  <link rel="stylesheet" href="../../../Assets/css/general.css">
  <link rel="stylesheet" href="../../../Assets/css/navbar.css">
  <link rel="stylesheet" href="../../../Assets/css/inicio_d.css">
</head>

<body>
  <!-- NAVEGACION NAVBAR -->
  <header>
    <div class="navbar">
      <div class="logo">
        <a href="./inicio.php"><img src="../../../Assets/images/iconos/Logo_diab.png" alt=""></a>
      </div>
      <ul class="links mb-0 px-0">
        <li><a href="./inicio.php">Inicio</a></li>
        <li><a href="../Seguimiento/seguimiento.php">Seguimiento</a></li>
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
      <li><a href="./inicio.php">Inicio</a></li>
      <li><a href="../Seguimiento/seguimiento.php">Seguimiento</a></li>
      <li><a href="../Plan_ali/plan_ali.php">Plan Alimenticio</a></li>
      <li><a href="../Reporte/reporte.php">Reporte</a></li>
      <li><a href="../Perfil/perfil.php">Perfil</a></li>
      <li><a href="../../../index.php" class="action_btn">Cerrar Sesión</a></li>
    </div>
  </header>

  <!-- SECTION PRINCIPAL -->
  <!-- SLIDER PAGINA INICIO -->
  <div id="carouselExampleDark" class="carousel carousel-dark slide container mt-5">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="../../../Assets/images/slider1.png" class="d-block slides" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Tenemos nuestros doctores</h5>
          <p>Puedes tener un seguimiento personalizado por doctores</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="../../../Assets/images/slider2.webp" class="d-block slides" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cuida tu alimentacion</h5>
          <p>Tendras tu plan alimenticio para tu cuidado</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="../../../Assets/images/slider3.png" class="d-block slides" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cuida tu salud</h5>
          <p>Es muy importante que cuides tu salud</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- SEGUNDA SECCION CARDS -->
  <!-- CARDS -->
  <div class="cont_cards">
    <div class="card_init">
      <h3 class="title">¿Qué es la diabetes?</h3>
      <p class="description">La diabetes es una enfermedad crónica que se caracteriza por niveles elevados de
        glucosa
        en la sangre. Puede ser de tipo 1, tipo 2 o gestacional.</p>
    </div>
    <div class="card_init">
      <h3 class="title text-center">Síntomas de la diabetes</h3>
      <p class="description">Algunos síntomas comunes de la diabetes incluyen sed excesiva, aumento de la frecuencia
        urinaria, fatiga, pérdida de peso inexplicada y visión borrosa.</p>
    </div>
    <div class="card_init">
      <h3 class="title text-center">Importancia de un plan alimenticio</h3>
      <p class="description">Contar con un plan alimenticio adecuado es fundamental para controlar los niveles de
        glucosa en la sangre. Un nutricionista puede ayudarte a diseñar un plan que se ajuste a tus necesidades y
        preferencias.</p>
    </div>
    <div class="card_init">
      <h3 class="title text-center">Haz seguimiento de tus comidas y medicamentos</h3>
      <p class="description">Es esencial llevar un registro de las comidas, los niveles de glucosa y la medicación
        para tener un control efectivo de la diabetes. Esto te permitirá identificar patrones y hacer ajustes
        necesarios.</p>
    </div>
  </div>

  <!-- TERCERA SECCION LISTA -->
  <!-- LISTA DE NUESTROS DOCTORES -->
  <h1 class="title-ourdoctors">Lista de nuestros doctores</h1>
  <?php
  $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
  $SQL = "SELECT * FROM user WHERE rol = 2";
  $dato = mysqli_query($conexion, $SQL); ?>
  <div class="cont_list">
    <?php if ($dato->num_rows > 0) {
      while ($fila = mysqli_fetch_array($dato)) { ?>
      <div class="doctors">
        <div class="image-docs"><img src="../../../Assets/images/list_doc.jpeg"></div>
        <div class="info-docs">
          <p class="fw-bold">Nombre: <?php echo $fila['nombre'] . ' ' . $fila['apellidos'] ?></p>
          <p class="fw-bold">Edad: <?php echo $fila['edad'] ?></p>
          <p class="fw-bold">Correo: <?php echo $fila['correo'] ?></p>
          <p class="fw-bold">Teléfono: <?php echo $fila['telefono'] ?></p>
        </div>
      </div>
      <?php }
      } else { ?>
        <h1>No Existen Registros</h1> <?php
      } ?>
  </div>

<!-- DIRECCION DE ARCHIVOS JAVASCRIPT -->
<script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
<script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
<script src="../../../Assets/js/menu.js"></script>
</body>

</html>
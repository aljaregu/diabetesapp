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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diab-help</title>
  <!-- BOOTSTRAP 5 -->
  <link rel="stylesheet" href="../../../Assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
  <!-- CSS PERSONALIZADO -->
  <link rel="stylesheet" href="../../../Assets/css/general.css">
  <link rel="stylesheet" href="../../../Assets/css/admin_dd.css">
  <link rel="stylesheet" href="../../../Assets/css/nav_admin.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <!-- SECCION DEL HEADER -->
  <header>
    <div class="navbar">
      <div class="logo">
        <a href="./admin.php"><img src="../../../Assets/images/iconos/Logo_diab.png" alt="Logo Diab-Help"></a>
      </div>
      <ul class="links px-0 mb-0">
        <li><a href="./admin.php">Lista de Doctores</a></li>
        <li><a href="./profile.php">Perfil de Administrador</a></li>
      </ul>
      <a href="../../../index.php" class="action_btn">Cerrar Sesión</a>
      <div class="toggle_btn">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>

    <div class="dropdown_menu">
      <li><a href="./admin.php">Lista de Doctores</a></li>
      <li><a href="./profile.php">Perfil de Administrador</a></li>
      <li><a href="../../../registrar.php" class="action_btn">Cerrar Sesión</a></li>
    </div>
  </header>

  <!-- SECCION TABLA CRUD NINI -->
  <section>
    <div class="container is-fluid">
      <div class="col-xs-12"><br><br>
        <h1>Bienvenido Administrador <?php echo $_SESSION['nombre']; ?> </h1>
        <h1 class="mb-4">Lista de usuarios</h1>
        <div>
          <a class="btn btn-success" href="./registrar.php">Nuevo usuario
          <i class="fa fa-plus"></i> </a>
        </div>
        <table class="table table-striped table-dark my-3" id="table_id">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Correo</th>
              <th>Password</th>
              <th>Telefono</th>
              <th>Fecha</th>
              <th>Rol</th>
              <th>Acciones</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
            $SQL = "SELECT user.id, user.nombre, user.correo, user.password, user.telefono, user.fecha, user.estado, permisos.rol FROM user LEFT JOIN permisos ON user.rol = permisos.id";
            $dato = mysqli_query($conexion, $SQL);
            if ($dato->num_rows > 0) {
              while ($fila = mysqli_fetch_array($dato)) { ?>
              <tr>
                <td>
                  <?php echo $fila['nombre']; ?>
                </td>
                <td>
                  <?php echo $fila['correo']; ?>
                </td>
                <td>
                  <?php echo $fila['password']; ?>
                </td>
                <td>
                  <?php echo $fila['telefono']; ?>
                </td>
                <td>
                  <?php echo $fila['fecha']; ?>
                </td>
                <td>
                  <?php echo $fila['rol']; ?>
                </td>
                <?php
                if ($fila['estado'] == 3) { ?>
                <td>
                  <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                  <i class="fa fa-edit"></i> </a>
                </td>
                <td><a class="btn btn-success"><i class="fa fa-check"></i></a></td>
                <?php } else { ?>
                <td>
                  <a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id'] ?> ">
                  <i class="fa fa-edit"></i> </a>
                  <a class="btn btn-danger" href="eliminar_user.php?id=<?php echo $fila['id'] ?>">
                  <i class="fa fa-trash"></i></a>
                </td>
                <td>
                  <script>
                    function ejecutarConsulta(id, x, button) {
                      var est = '';
                      if (x == 1) {
                        est = 0;
                      } else if (x == 0) {
                        est = 1;
                      }
                      $.ajax({
                        url: '../../../includes/estado.php',
                        method: 'POST',
                        data: {
                          id: id,
                          estado: est
                        },
                        success: function(response) {
                          console.log(response);
                          window.location.reload();
                        },
                          error: function(xhr, status, error) {
                          console.error(error);
                          alert('There was an error processing your request. Please try again later.');
                        }
                      });
                    }
                  </script> 
                  <?php if ($fila['estado'] == 1) {
                          $class = 'btn btn-success';
                        } else if ($fila['estado'] == 0) {
                          $class = 'btn btn-dark';
                        } ?>
                      <a class="<?php echo $class; ?>" onclick="ejecutarConsulta(<?php echo $fila['id']; ?>, <?php echo $fila['estado']; ?>,this)">
                      <i class="fa fa-<?php echo ($fila['estado'] == 1) ? 'check' : 'ban'; ?>"></i></a>
                </td> <?php } ?>
              </tr>
              <?php }
            } else { ?>
              <tr class="text-center">
                <td colspan="16">No existen registros</td>
              </tr> <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- SCERIPTS DE JAVASCRIPT -->
  <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
  <script src="../../../Assets/js/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_js_bootstrap.bundle.min.js"></script>
  <script src="../../../Assets/js/menu.js"></script>
</body>

</html>
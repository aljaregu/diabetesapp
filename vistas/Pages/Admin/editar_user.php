<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id = $_SESSION['id'];
if ($validar == null || $validar = '') {
    header("Location: http://localhost/r_user/includes/login.php");
    die();
}

$id = $_GET['id'];
$conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
$consulta = "SELECT * FROM user WHERE id = $id";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);
?>
<?php include '../header.php'; ?>
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
    <link rel="stylesheet" href="../css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../../Assets/css/edit_pac.css">
    <link rel="stylesheet" href="../../../Assets/css/general.css">
</head>

<body id="page-top">
    <form action="../../../includes/_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12 cont-edit">
                            <h3 class="text-center">Editar usuario</h3>
                            <div class="form-group">
                                <label label for="nombre" class="form-label">Nombre: </label>
                                <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos" class="form-label">Apellidos: </label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" value="<?php echo $usuario['apellidos']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="edad" class="form-label">Edad: </label>
                                <input type="text" id="edad" name="edad" class="form-control" value="<?php echo $usuario['edad']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="peso" class="form-label">Peso: </label>
                                <input type="text" id="peso" name="peso" class="form-control" value="<?php echo $usuario['peso']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="" value="<?php echo $usuario['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono: </label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type="password" name="password" id="password" class="form-control" value="<?php echo $usuario['password']; ?>" required>
                                <input type="hidden" name="accion" value="editar_registro">
                            </div>
                            <div class="form-group">
                                  <label for="rol" class="form-label">Rol de usuario *</label>
                                <input type="number"  id="rol" name="rol" class="form-control" placeholder="Escribe el rol, 1 admin, 2 lector.." value="<?php echo $usuario['rol'];?>" required>
                                  <input type="hidden" name="accion" value="editar_registro">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Editar</button>
                                <a href="admin.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
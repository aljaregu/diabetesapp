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
    <title>Eliminar Usuarios</title>
    <!-- BOOTSTRAP 5 -->
    <link rel="stylesheet" href="../../../Assets/css/cdn.jsdelivr.net_npm_bootstrap@5.3.0_dist_css_bootstrap.min.css">
    <!-- CSS PERSONALIZADO -->
    <link rel="stylesheet" href="../../../Assets/css/general.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-danger text-center">
                    <p>¿Desea confirmar la eliminacion del registro?</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="../../../includes/_functions.php" method="POST">
                        <input type="hidden" name="accion" value="eliminar_registro_doc">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <input type="submit" name="" value="Eliminar" class=" btn btn-danger">
                        <a href="admin.php" class="btn btn-success">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>

</html>
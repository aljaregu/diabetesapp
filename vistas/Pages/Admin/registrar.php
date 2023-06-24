<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id_doc = $_SESSION['id'];
if ($validar == null || $validar = '') {
    header("Location: ./includes/login.php");
    die();
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <form action="./validar.php" method="POST">
        <div id="login">
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <br>
                            <br>
                            <h3 class="text-center">Registro de nuevo usuario</h3>
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="apellidos" class="form-label">Apellidos *</label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="edad" class="form-label">Edad *</label>
                                <input type="number" id="edad" name="edad" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="peso" class="form-label">Peso *</label>
                                <input type="number" step="0.01" id="peso" name="peso" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Correo:</label><br>
                                <input type="email" name="correo" id="correo" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="telefono" class="form-label">Telefono *</label>
                                <input type="tel" id="telefono" name="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña:</label><br>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="rol" class="form-label">Rol de usuario </label>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6 col-md-4">
                                            <select class="form-select" type="number" id="rol" name="rol">
                                                <option value="1">Administrador</option>
                                                <option value="2">Doctor</option>
                                                <option value="3">Paciente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-3">
                                <input type="submit" value="Guardar" class="btn btn-success" name="registrar">
                                <input type="hidden" value="<?php echo $id_doc; ?>" name="id_doc">
                                <a href="./admin.php" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
</body>

</html>

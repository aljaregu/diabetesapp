<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diab-help</title>
    <!-- CSS de la vista Loggin -->
    <link rel="stylesheet" href="../Assets/css/general.css">
    <link rel="stylesheet" href="../Assets/css/index.css">
</head>

<body>
    <section class="log-cont">
        <div class="wrapper">
            <!-- <span class="icon-close">
                <i class="fa-solid fa-xmark"></i>
            </span> -->
            <div class="form-box login">
                <h2>INICIO DE SESIÓN</h2>
                <form action="./_functions.php" method="POST">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="text" name="nombre" id="nombre" required>
                        <label>Nombre de usuario</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="password" id="password" required>
                        <input type="hidden" name="accion" value="acceso_user">
                        <label>Contraseña</label>
                    </div>
                    <input type="submit" class="btn" value="Ingresar">
                </form>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/2fafaa0adf.js" crossorigin="anonymous"></script>
</body>

</html>
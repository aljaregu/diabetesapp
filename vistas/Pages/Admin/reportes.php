<?php
session_start();
error_reporting(0);
$validar = $_SESSION['nombre'];
$id = $_SESSION['id'];
if ($validar == null || $validar = '') {
    header("Location: ../includes/login.php");
    die();
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
</head>

<body>

    <h1>Generador de Reportes</h1>

    <form action="../includes/_functions.php" method="POST">
        
    <h1>Datos:</h1><br>

    <label for="doctor">Doctor:</label>
    <input type="text" id="doctor" name="doctor" required><br>

    <label for="paciente">Paciente:</label>
    <input type="text" id="paciente" name="paciente" required><br>

    <label for="edad">Edad:</label>
    <input type="number" id="edad" name="edad" required><br>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required><br>

    <label for="hora">Hora:</label>
    <input type="time" id="hora" name="hora" required><br>

    <h1>Misceláneos:</h1><br>

    <label for="glicemia">Glicemia:</label>
    <input type="number" id="glicemia" name="glicemia" required><br>

    <label for="hbglicosilada">HbGlicosilada:</label>
    <input type="number" id="hbglicosilada" name="hbglicosilada" required><br>

    <label for="NUS">NUS:</label>
    <input type="text" id="NUS" name="NUS" required><br>

    <label for="urea">Urea:</label>
    <input type="number" id="urea" name="urea" required><br>

    <label for="creatinina">Creatinina:</label>
    <input type="number" id="creatinina" name="creatinina" required><br>

    <label for="acidoUrico">Ácido Úrico:</label>
    <input type="number" id="acidoUrico" name="acidoUrico" required><br>

    <label for="calcio">Calcio:</label>
    <input type="number" id="calcio" name="calcio" required><br>

    <label for="fosforo">Fósforo:</label>
    <input type="number" id="fosforo" name="fosforo" required><br>

    <label for="colesterol">Colesterol:</label>
    <input type="number" id="colesterol" name="colesterol" required><br>

    <label for="trigliceridos">Triglicéridos:</label>
    <input type="number" id="trigliceridos" name="trigliceridos" required><br>

    <label for="gdl">GDL:</label>
    <input type="number" id="gdl" name="gdl" required><br>

    <label for="ldl">LDL:</label>
    <input type="number" id="ldl" name="ldl" required><br>

    <label for="proteinasTotales">Proteínas Totales:</label>
    <input type="number" id="proteinasTotales" name="proteinasTotales" required>

    <label for="albumina">Albumina:</label>
    <input type="number" id="albumina" name="albumina" required><br>

    <label for="magnesio">Magnesio:</label>
    <input type="number" id="magnesio" name="magnesio" required><br>
    
    <label for="nota">Nota:</label>
    <input type="number" id="nota" name="nota" required><br>

    <input type="submit" value="Generar Reporte">

    <input type="hidden" name="accion" value="generar_reporte">
    <input type="hidden" name="id_doctor" value="<?php echo $id?>">
    <input type="hidden" name="id_paciente" value="<?php echo $_GET['id']?>">
    </form>
</body>

</html>
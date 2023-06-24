<?php

require_once("../Helpers/Helpers.php");
require_once("_db.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break;
        case 'editar_registro_doc':
            editar_registro_doc();
            break;
        case 'generar_seguimiento':
            generar_seguimiento();
            break;
        case 'generar_plan':
            generar_plan();
            break;
        case 'generar_reporte':
            generar_reporte();
            break;

        case 'eliminar_registro';
            eliminar_registro();
            break;
        case 'eliminar_registro_doc';
            eliminar_registro_doc();
            break;

        case 'acceso_user';
            acceso_user();
            break;
    }

}

function generar_plan()
{

    extract($_POST);
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");

    $consulta = "INSERT INTO plan_alimenticio (descripcion, id_pac)
    VALUES ('$descripcion', '$id')";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../vistas/Pages/Doctor/doctor.php');
}
function generar_reporte()
{
    extract($_POST);
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");


    $sql = "SELECT nombre FROM user WHERE id = $id_pac";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        $fila = mysqli_fetch_assoc($resultado);
        $nombre = $fila['nombre'];

    }


    mysqli_query($conexion, $sql);



    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");


    $sql2 = "SELECT nombre FROM user WHERE id = $id_doctor";
    $resultado2 = mysqli_query($conexion, $sql2);

    if ($resultado2) {
        $fila2 = mysqli_fetch_assoc($resultado2);
        $doctor = $fila2['nombre'];

    }


    mysqli_query($conexion, $sql2);

    $consulta = "INSERT INTO reportes (id_doctor, id_paciente, doctor, paciente, fecha, hora, glicemia, hbglicosilada, nus, urea, creatinina, acido_urico, calcio, fosforo, colesterol, trigliceridos, hdl, ldl, proteinas_totales, albumina, magnesio, nota)
    VALUES ('$id_doctor', '$id_pac', '$doctor','$nombre','$fecha','$hora','$glicemia','$hbglicosilada','$NUS','$urea','$creatinina','$acidoUrico','$calcio','$fosforo','$colesterol','$trigliceridos','$gdl','$ldl','$proteinasTotales','$albumina','$magnesio','$nota')";


    mysqli_query($conexion, $consulta);

    mysqli_close($conexion);
    header('Location: ../vistas/Pages/Doctor/doctor.php');

}

function generar_seguimiento()
{
    extract($_POST);
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");

    $consulta = "INSERT INTO seguimiento (fecha, hora, medico, descripcion, id_doc, id_pac)
    VALUES ('$fecha', '$hora','$medico','$descripcion', '$id_doc', $id)";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../vistas/Pages/Doctor/doctor.php');
}
function editar_registro()
{
    extract($_POST);
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");

    $est = 1;
    if ($rol == 1) {
        $est = 3;
    }
    $consulta = "UPDATE user SET nombre = '$nombre', apellidos = '$apellidos', edad = '$edad', peso = '$peso', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol', estado = '$est' WHERE id = '$id' ";
    mysqli_query($conexion, $consulta);


    header('Location: ../vistas/Pages/Admin/admin.php');

}
function editar_registro_doc()
{
    extract($_POST);
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");

    $consulta = "UPDATE user SET nombre = '$nombre', apellidos = '$apellidos', edad = '$edad', peso = '$peso', correo = '$correo', telefono = '$telefono', password ='$password' WHERE id = '$id'";
    mysqli_query($conexion, $consulta);
    header('Location: ../vistas/Pages/Doctor/admin.php');


}

function eliminar_registro()
{
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../vistas/Pages/Admin/admin.php');

}
function eliminar_registro_doc()
{
    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../vistas/Pages/Doctor/admin.php');

}

function acceso_user()
{
    // $nombre = $conexion->real_escape_strings($_POST['nombre']);
    // $password = $conexion->real_escape_strings($_POST['password']);
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conexion = mysqli_connect("localhost", "root", "", "db_diabetes");
    $consulta = "SELECT * FROM user WHERE nombre='$nombre' AND password='$password'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_fetch_array($resultado);

    $_SESSION['id'] = $filas['id'];

    if ($filas['estado'] <> 0) {
        if ($filas['rol'] == 1) { //admin
            header('Location: ../vistas/Pages/Admin/admin.php');
        } else if ($filas['rol'] == 2) { //Doctor
            header('Location: ../vistas/Pages/Doctor/doctor.php');
        } else if ($filas['rol'] == 3) { //Paciente
            header('Location: ../vistas/Mobile/Inicio/inicio.php');
        } else {

            header('Location: login.php');
            session_destroy();

        }
    } else {
        header('Location: ./bloqueado.php');
        session_destroy();
    }


}
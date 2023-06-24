<?php
$conexion= mysqli_connect("localhost", "root", "", "db_diabetes");

if(isset($_POST['registrar'])){

    if(strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) >= 1 ){

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);
    $id_doc = trim($_POST['id_doc']);
    $apellidos = trim($_POST['apellidos']);
    $edad = trim($_POST['edad']);
    $peso = trim($_POST['peso']);
    $est = 1;
    if ($rol == 1) {
      $est = 3;
    }

    $consulta= "INSERT INTO user (nombre, apellidos, edad, peso, correo, telefono, password, rol, estado, id_doc)
    VALUES ('$nombre', '$apellidos', '$edad', '$peso', '$correo','$telefono','$password', '$rol', '$est', '$id_doc' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ./admin.php');
  }
}
?>
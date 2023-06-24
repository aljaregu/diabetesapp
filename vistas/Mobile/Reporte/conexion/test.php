<?php 
require('./Conexion.php');
	$data=new Conexion();
	$conexion=$data->getConexion();
	$strquery ="SELECT * FROM reportes";
	$result = $conexion->prepare($strquery);
	$result->execute();
	$data = $result->fetchall(PDO::FETCH_ASSOC);
	
	var_dump($data);
 ?>
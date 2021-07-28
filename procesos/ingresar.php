<?php 
	session_start();
	include_once 'conexion.php';
	$usuario = $_POST['txtUsu'];
	$contrasena = $_POST['txtPass'];
	$sentencia = $bd->prepare('select * from usuarios where 
								usuario = ? and contrasena = ?;');
	$sentencia->execute([$usuario, $contrasena]);
	$datos = $sentencia->fetch(PDO::FETCH_OBJ);
	//print_r($datos);

	if ($datos === FALSE) {
		header('Location: login.php');
	}elseif($sentencia->rowCount() == 1){
		$_SESSION['nombre'] = $datos->usuario;
		header('Location: index.php');
	}
?>
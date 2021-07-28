<?php 

	//Actualización de tabla clientes
	require_once "../conexion.php";
	require_once "../metodosCrud.php";

	$nombre=$_POST['txtnombre'];
	$apellido=$_POST['txtapellido'];
	$dpi=$_POST['txtdpi'];
	$telefono=$_POST['txttelefono'];
	$email=$_POST['txtemail'];
	$direccion=$_POST['txtdireccion'];
	$id=$_POST['id'];

	$datos=array(
			$nombre,
			$apellido,
			$dpi,
			$telefono,
			$email,
			$direccion,
			$id
				);
	$obj= new metodos();

	if($obj->actualizaDatosNombre($datos)==1){
		header("location:../index.php");
	}else{
		echo "Hubo un fallo al Actualizar un registro";
	}
 ?>
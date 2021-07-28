<?php 
	require_once "../conexion.php";
	require_once "../metodosCrud.php";

	$nombre=$_POST['txtnombre'];
	$apellido=$_POST['txtapellido'];
	$dpi=$_POST['txtdpi'];
	$telefono=$_POST['txttelefono'];
	$email=$_POST['txtemail'];
	$direccion=$_POST['txtdireccion'];
	


	$datos=array(
			$nombre,
			$apellido,
			$dpi,
			$telefono,
			$email,
			$direccion
				);
	$obj= new metodos();
	if (!empty($nombre) || !empty($apellido) || !empty($dpi) || !empty($telefono) || !empty($email) || !empty($direccion)){
		if($obj->insertarDatosNombre($datos)==1){
			header("location:../index.php");
		}else{
			echo "Hubo un fallo del Agregar un registro";
		}
	}

	else{
		echo "Debe ingresar todos los campos";
	}

 ?>
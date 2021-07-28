<?php 
	//Eliminación de datos en tabla cliente

    // Obtener Id del cliente seleccionado
	$id=$_GET['id_cliente'];

	// Requerir conexión y métodos
	require_once "../conexion.php";
	require_once "../metodosCrud.php";

	$obj= new metodos();
	if($obj->eliminarDatosNombre($id)==1){

		// Luego de eliminar redirigir a index
		header("location:../index.php");
	}else{

		//Mensaje de error
		echo "Hubo un fallo al Eliminar registro";
	}
 ?>
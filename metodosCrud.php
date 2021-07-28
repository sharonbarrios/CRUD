<?php 

	// Métodos para realizar CRUD
	class metodos{

		// Mostrar datos en pantalla
		public function mostrarDatos($sql){
			$c= new conectar();
			$conexion=$c->conexion();

			$result=mysqli_query($conexion,$sql);

			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		}


		// Función para insertar datos
		public function insertarDatosNombre($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql= "INSERT into clientes (nombres, apellidos, dpi, telefono, email, direccion)
							values ('$datos[0]','$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]')";

			return $result=mysqli_query($conexion,$sql);
		}


		//Función para actualización de datos
		public function actualizaDatosNombre($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE clientes set nombres='$datos[0]',
										apellidos='$datos[1]',
										dpi='$datos[2]',
										telefono='$datos[3]',
										email='$datos[4]',
										direccion='$datos[5]'
								where id_cliente='$datos[6]'";
			return $result=mysqli_query($conexion,$sql);

		}


		//Función para eliminar datos
		public function eliminarDatosNombre($id){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from clientes where id_cliente='$id'";
			return $result=mysqli_query($conexion,$sql);
		}
	}
 ?>
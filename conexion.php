<?php 

	// Datos para la conexión a la base de datos
	class conectar{
		private $servidor="localhost";
		private $usuario="root";
		private $bd="ventas";
		private $password="";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}

	}




	
 ?>
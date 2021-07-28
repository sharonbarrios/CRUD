<?php
	require_once("procesos/sesion.php");

	$sesion = new sesion();
	
	if( isset($_POST["iniciar"]) )
	{
		
		$usuario = $_POST["usuario"];
		$password = $_POST["contrasena"];
		
		if(validarUsuario($usuario,$password) == true)
		{			
			$sesion->set("usuario",$usuario);
			
			header("location: index.php");
		}
		else 
		{
			echo "Verifica tu nombre de usuario y contraseña";
		}
	}
	
	function validarUsuario($usuario, $password)
	{
		require_once "conexion.php";
		$obj= new conectar();
		$conexion=$obj->conexion();

		$consulta = "select contrasena from usuarios where usuario = '$usuario';";
		
		$result = $conexion->query($consulta);
		
		if($result->num_rows > 0)
		{
			$fila = $result->fetch_assoc();
			if( strcmp($password,$fila["contrasena"]) == 0 )
				return true;						
			else					
				return false;
		}
		else
				return false;
	}

?>
<html>
<head>
<title>Login</title>
<link rel="shortcut icon" href="assets/imagenes/logo.PNG" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<form name="frmLogin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <div>
  <div class="text-center pt-5">
  <img src="assets/imagenes/logo.PNG" height="150px" alt="">
  
  </div>
   <h1 class="text-center">Inicio de Sesión</h1>
   <div class="container col-md-4">
   <div class="form-group">
   <label>Usuario: </label> 
   <input type="text" class="form-control" name = "usuario"/></div>
   
   <div class="form-group">
   
    <label>Contraseña: </label> 
	<input type="password" class="form-control"name = "contrasena" />
   </div>

   <div class="form-group text-center">
    <input type="submit" class="btn btn-primary" name ="iniciar" value="Ingresar"/>
   
   </div>
   
   </div>
   
   </div>
   
   
  
  </div>
</form>
</body>
</html>
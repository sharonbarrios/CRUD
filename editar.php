<?php 

	// Edición de datos tabla cliente
	//Añadir conexión

	require_once "conexion.php";
	$obj= new conectar();
	$conexion=$obj->conexion();

	// Id del cliente
	$id=$_GET['id_cliente'];

	//Insertar datos a tabla
	$sql="SELECT nombres,apellidos,dpi,telefono,email,direccion 
			from clientes where id_cliente='$id'";
	$result=mysqli_query($conexion,$sql);
	$ver=mysqli_fetch_row($result);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar Cliente</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<!--   Formulario para actualizar datos -->
<form action="procesos/actualizar.php" method="post">
<div class="container col-md-6"> 
<h2 class="text-center">Editar Cliente
	<button class="btn btn-primary text-right">Actualizar</button>
	</h2>
<div class="form-group">
<input type="text" hidden="" value="<?php echo $id ?>" name="id">
	<label>Nombre</label>
	<input type="text" name="txtnombre" class="form-control" value="<?php echo $ver[0] ?>">
</div>

<div class="form-group">
<label>Apellido</label>
	<input type="text" name="txtapellido" class="form-control" value="<?php echo $ver[1] ?>">
</div>

<div class="form-group">
<label>CUI</label>
	<input type="text" name="txtdpi" class="form-control" value="<?php echo $ver[2] ?>">

</div>


<div class="form-group">

<label>Teléfono</label>
	<p></p>
	<input type="text" name="txttelefono" class="form-control" value="<?php echo $ver[3] ?>">
</div>


<div class="form-group">
<label>Correo Electrónico</label>
	<p></p>
	<input type="text" name="txtemail" class="form-control" value="<?php echo $ver[4] ?>">

</div>

<div class="form-group">
<label>Dirección</label>
	<input type="text" name="txtdireccion" class="form-control" value="<?php echo $ver[5] ?>">

</div>

</div>
	
	
</form>
</body>
</html>
<?php 

	// Requerir conexión y métodos
	require_once "conexion.php";
	require_once "metodosCrud.php";
	require_once "procesos/sesion.php";
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{	
		header("Location: login.php");		
	}
	else 
	{
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Clientes</title>
	<link rel="shortcut icon" href="assets/magenes/logo.PNG" type="image/x-icon">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="pl-5 pr-5">

<!--   Formulario para insertar un cliente-->
<form action="procesos/insertar.php" method="post">
<h5 class="text-right pt-4">Bienvenido(a)  <?php echo $sesion->get("usuario"); ?> <a href="procesos/cerrarsesion.php" class="pl-3 text-danger"> Cerrar Sesión </a><br></h5><br>
<div class="row container">

<div class="col-md-3">
<h2>Agregar Cliente</h2>
	<div class="form-group">
	<input type="text" class="form-control" name="txtnombre" placeholder="Ingrese nombres">
	</div>

	<div class="form-group">
	<input type="text" class="form-control" name="txtapellido" placeholder="Ingrese apellidos">
	</div>

	<div class="form-group">
	<input type="text" class="form-control" name="txtdpi" id="" placeholder="Ingrese CUI">
	</div>

	<div class="form-group">
	<input type="text" class="form-control" name="txttelefono" id="" placeholder="Ingrese teléfono">
	</div>

	<div class="form-group">
	<input type="email" class="form-control" name="txtemail" id="" placeholder="Ingrese email">
	</div>

	<div class="form-group">
	<input type="text" class="form-control" name="txtdireccion" id="" placeholder="Ingrese dirección">
	</div>
	<button class="btn btn-primary text-right">Agregar</button>
	</div>

</form>

<div class="col-md-5 text-center">

<!--   Mostrar Clientes-->

<h2 class="text-center">Datos Clientes
<a href="reporte.php" class="btn btn-success text-right"> Generar Reporte </a>
</h2>

<table class="table table-hover table-bordered">

<thead class="thead-light">

	<tr>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>CUI</td>
		<td>Teléfono</td>
		<td>Email</td>
		<td>Dirección</td>
		<td>Actualizar</td>
		<td>Eliminar</td>
	</tr>

</thead>
<?php 

  // Requerir clientes en base de datos
	$obj= new metodos();
	$sql="SELECT id_cliente,nombres,apellidos,dpi,telefono,email,direccion from clientes";
	$datos=$obj->mostrarDatos($sql);

	foreach ($datos as $key ) {
 ?>
	<tr>
		<td><?php echo $key['nombres']; ?></td>
		<td><?php echo $key['apellidos']; ?></td>
		<td><?php echo $key['dpi']; ?></td>
		<td><?php echo $key['telefono']; ?></td>
		<td><?php echo $key['email']; ?></td>
		<td><?php echo $key['direccion']; ?></td>
		<td>
			<a href="editar.php?id_cliente=<?php echo $key['id_cliente'] ?>">
			Editar
			</a>
		</td>
		<td>
			<a href="procesos/eliminar.php?id_cliente=<?php echo $key['id_cliente'] ?>">
			eliminar
			</a>
		</td>
	</tr>
<?php 
	}
 ?>
</table>





</div>


</body>
</html>
<?php 
	}	
?>
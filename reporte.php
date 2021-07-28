<?php
	//Generación de reporte
	
	include 'plantilla.php';
	require 'conexion.php';

	$obj= new conectar();
	$conexion=$obj->conexion();

	//Consulta datos para reporte
	$query = "SELECT id_cliente, concat_ws(' ', nombres, apellidos) as cliente, telefono, email FROM clientes";
	$resultado = $conexion->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	// Columnas que conforman el reporte
	$pdf->SetFillColor(135, 206, 250);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(25,6,'CODIGO',1,0,'C',1);
	$pdf->Cell(65,6,'NOMBRE',1,0,'C',1);
	$pdf->Cell(35,6,'TELEFONO',1,0,'C',1);
	$pdf->Cell(60,6,'EMAIL',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(25,6,utf8_decode($row['id_cliente']),1,0,'C');
		$pdf->Cell(65,6,utf8_decode($row['cliente']),1,0,'C');
		$pdf->Cell(35,6,utf8_decode($row['telefono']),1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['email']),1,1,'C');
	}
	$pdf->Output();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="assets/imagenes/logo.PNG" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reporte Clientes</title>
</head>
<body>
	
</body>
</html>



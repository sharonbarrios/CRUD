<?php

	// Requerir la librería fpdf
	require 'librerias/pdf/fpdf.php';
	
	// Plantilla para generación de reporte en PDF
	class PDF extends FPDF
	{
		//Encabezado
		function Header()
		{
			$this->Image('assets/imagenes/logo.PNG', 25, 8, 15 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte Contacto de Clientes',0,0,'C');
			$this->Ln(20);
		}
		
		//Pie de página
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>
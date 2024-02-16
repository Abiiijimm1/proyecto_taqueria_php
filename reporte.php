<?php
require('fpdf/fpdf.php');
require('conexion/conexion.php');

$pdf = new FPDF('L','mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
/* $pdf->Image('../img/libros' , 10 ,8, 10 , 13,'PNG'); */
$pdf->Cell(110, 10, '', 0);
$pdf->Cell(200, 10, 'TAQUERIA "EL PERRO FELIZ', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(110, 8, '', 0);
$pdf->Cell(100, 8, 'REPORTE DE BEBIDAS', 0);
$pdf->Ln(18);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(16, 8, '', 0);
$pdf->Cell(33, 8, 'NO.', 0);
$pdf->Cell(32, 8, 'BEBIDA', 0);
$pdf->Cell(33, 8, 'PRECIO', 0);
$pdf->Cell(40, 8, 'DESCRIPCION', 0);
$pdf->Cell(50, 8, 'EXISTENCIAS', 0);
$pdf->Cell(28, 8, 'COLUMNA', 0);
$pdf->Cell(25, 8, 'COLUMNA', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$consulta = "SELECT * FROM bebida WHERE estatus = '1'"; 
$ejecConsulta = mysqli_query($conectar,$consulta);

while($reg = mysqli_fetch_array($ejecConsulta)){
	$pdf->Cell(15, 8, $reg[0], 0);
	$pdf->Cell(18, 8,$reg[1], 0);
	$pdf->Cell(22, 8,$reg[2], 0);
	$pdf->Cell(32, 8,$reg[3], 0);
	$pdf->Cell(30, 8,$reg[4], 0);
	// $pdf->Cell(25, 8,$reg[], 0);
	// $pdf->Cell(64, 8,$reg[''], 0);
	// $pdf->Cell(30, 8,$reg[''], 0);
	// $pdf->Cell(0, 8,$reg[''], 0); 
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'',0);
//$pdf->Cell(31,8,'PIE DE PÁGINA',0);
$pdf->Output();
?>

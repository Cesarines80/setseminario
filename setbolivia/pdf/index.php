<?php
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,10,'¡Hola, Mundo!',1,2,C,0);
$pdf->Cell(60,10,'Hecho con FPDF.',1,1,'C');

$pdf->Output();
?>
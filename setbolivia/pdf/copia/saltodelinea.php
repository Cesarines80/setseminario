<?php
require_once('fpdf.php');
class PDF extends FPDF
{
	function Header()
	{
		global $title;
		
		// Arial Bold 15
		$this->SetFont('Arial','B',15);
		//Calculamos ancho y posicion del titulo
		$w= $this->GetStringWidth($title)+6;
		$this->SetX((210-$w)/2);
		//Colores de los bordes, fondo y texto
		$this->SetDrawColor(0,80,180);
		$this->SetFillColor(230,230,0);
		$this->SetTextColor(220,50,50);
		//Ancho del borde (1mm)
		$this->SetLineWidth(1);
		//Titulo
		$this->Cell($w,9,$title,1,1,'C',true);
		//Salto de Linea
		$this->Ln(10);
		}
		
		function Footer()
		{
			//Posicion a 1,5 cm del final
			$this->SetY(-15);
			//Arial italica 8
			$this->SetFont('Arial','I',8);
			//Color del texto en gris
			$this->SetTextColor(128);
			//Numero d epagina
			$this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
			
			}
	  function ChapterTitle($num, $label)
	  {
		  //Arial 12
		  $this->SetFont('Arial','',12);
		  //Color de fondo
		  $this->SetFillColor(200,220,255);
		  //Titulo
		  $this->Cell(0,6,"Capitulo $num : $label",0,1,'L',true);
		  //Salto de linea
		  $this->Ln(4);
		  }
		
		function ChapterBody($file)
		{
			//Leemos el fichero
			$txt = file_get_contents($file);
			//Times 12
			$this->SetFont('Times','',12);
			//Imprimimos el texto justificado
			$this->MultiCell(0,5,$txt);
			//Salto de Linea
			$this->Ln();
			//Cita en Italica
			$this->SetFont('','I');
			$this->Cell(0,5,'(fin del extracto)');
			
			}
			function PrintChapter($num, $title, $file)
			{
				$this->AddPage();
				$this->ChapterTitle($num,$title);
				$this->ChapterBody($file);
				
				}
	
	}
	
	$pdf = new PDF();
	$title = '20000 Lenguas de Viaje Submarino';
	$pdf->SetTitle($title);
	$pdf->SetAuthor('julio Verne');
	$pdf->PrintChapter(1,'Unrizo de huida','20k_c1.txt');
	$pdf->PrintChapter(2,'Los Pros y los contras','20k_c2.txt');
	$pdf->Output();
	
	

?>	

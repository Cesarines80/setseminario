<?php
require_once("fpdf.php");
require_once('../alumnos/class.php');
//require_once('../class/print.php');
//print_r($_GET); exit;

$m = $_GET['id_alm'];

class PDF extends FPDF
{

	// Cabecera de pagina
		function Cabecera()
		{
				//Logo
				$this->Image('dX3FYQjx.jpg',5,8,28);
				$this->Image('marco.jpg',170,8,30);

				//arial bold 15
				$this->SetFont('Arial','B',8);
				//Movernos a la Derecha
				$this->Cell(40);
				// Titulo
				$this->Cell(100,10,'SEMINARIO DE ESTUDIOS TEOLOGICOS',0,0,'C');
				//Salto de linea
				$this->Ln(3);
				$this->SetFont('Arial','I',8);
				//Movernos a la Derecha
				$this->Cell(40);
				// Titulo
				$this->Cell(100,10,'Iglesia de Dios de la Profecia - P.J. 176921 ',0,0,'C');

				$this->Ln(3);
				$this->SetFont('Arial','I',8);
				//Movernos a la Derecha
				$this->Cell(40);
				// Titulo
				$this->Cell(100,10,'Bolivia',0,0,'C');
				$this->Ln(5);
				$this->SetFont('Arial','I',11);
				//Movernos a la Derecha

				$this->Ln(20);
				$this->Cell(190,0,'',1,0,'C');

				//Salto de linea

				$this->Ln(5);



		}




		function Body()
		{
		   $obj = new Consultas();
			$datos = $obj->get_alum($_GET['id_alm']);

			$this->SetFont('Arial','I',12);
			$this->Cell(30,5,'CODIGO',1,0,'C',false);
			$this->Cell(100,5,'',1,0,'C',false);
			$this->Cell(60,5,'RECORD DE NOTAS',1,0,'C',false);
			$this->Ln();
			$this->Cell(100,5,'Nombre y Apellido del Estudiante',1,0,'C',false);
			$this->Cell(90,5, $datos[0]['nombre'].' '. $datos[0]['apellido'],1,0,'C',false);
			$this->Ln();
			$this->Cell(30,5,'Iglesia',1,0,'C',false);
			$this->Cell(50,5,$datos[0]['miembro'],1,0,'C',false);
			$this->Cell(20,5,'D -'.$datos[0]['distrito'],1,0,'C',false);
			$this->Cell(40,5,'Departamento',1,0,'C',false);
			$this->Cell(50,5,'Oruro',1,0,'C',false);
				//Movernos a la Derecha

				$this->Ln();
			$this->SetFont('Arial','I',14);
			$this->Cell(40);
			$this->Cell(100,10,'DIPLOMA MINISTERIAL',0,0,'C');

				$this->Ln();

		}


				//Pie de Pagina
		function Footers()
		{   //Posicion a 1,5 cm del final
					$this->SetY(-15);
					//Arial Italic 8
					$this->SetFont('Arial','I',8);
					//Numero de pagina
					$this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
		}

		 function FancyTable()
		{
			// Colores, ancho de línea y fuente en negrita
			$this->SetFillColor(3,10,73);
			$this->SetTextColor(255);
			$this->SetDrawColor(100,100,100);
			$this->SetLineWidth(.3);
			$this->SetFont('Arial','B',7);
			$this->Cell(10,7,'N',1,0,'C',true);
			$this->Cell(30,7,'Fecha ',1,0,'C',true);
			$this->Cell(60,7,'Materia',1,0,'C',true);
			$this->Cell(20,7,'Credito',1,0,'C',true);
			$this->Cell(50,7,'Docente',1,0,'C',true);
			$this->Cell(20,7,'Nota',1,0,'C',true);
			$this->Ln();
			$this->SetFillColor(224,235,255);
			$this->SetTextColor(0);
			$obj = new Consultas();
				  $datos = $obj->get_materia(1);
			   	$j=1;
				for ($i = 0; $i <sizeof($datos) ; $i++)
				{
		 		    $d=$datos[$i]['id_mat'];
         		$v=$_GET['id_alm'];
				    $notas = $obj->get_notas($v, $d);
          $this->SetFont('Arial','I',7);
          $this->Cell(10,5,$j,1,0,'C',false);
        if (!empty($notas[0]['docente'])){
                    $not = $notas[0]['docente'];
                    $docentes = $obj->get_docentes($not);
      				$this->Cell(30,5,$notas[0]['fecha'],1,0,'C',false);
							$this->Cell(60,5,$datos[$i]['descripcion'],1,0,'C',false);
							$this->Cell(20,5,$datos[$i]['creditos'],1,0,'C',false);
							$this->Cell(50,5,$docentes[0]['nombre'].' '.$docentes[0]['apellido'],1,0,'C',false);
							$this->Cell(20,5,$notas[0]['nota'],1,1,'C',false);


            } else {

                $this->Cell(30,5," ",1,0,'C',false);
                $this->Cell(60,5,$datos[$i]['descripcion'],1,0,'C',false);
                $this->Cell(20,5,$datos[$i]['creditos'],1,0,'C',false);
                $this->Cell(50,5," ",1,0,'C',false);
                $this->Cell(20,5," ",1,1,'C',false);

             }
               $this->Ln(0);

               $j++;
				}

					$this->SetFont('Arial','I',14);
					$this->Cell(40);
					$this->Cell(100,10,'MENSION EN TEOLOGIA BIBLICA',0,0,'C');

						$this->Ln();
						$this->SetFillColor(3,10,73);
					$this->SetTextColor(255);
					$this->SetDrawColor(100,100,100);
					$this->SetLineWidth(.3);
					$this->SetFont('Arial','B',7);
					$this->Cell(10,7,'N',1,0,'C',true);
					$this->Cell(30,7,'Fecha ',1,0,'C',true);
					$this->Cell(60,7,'Materia',1,0,'C',true);
					$this->Cell(20,7,'Credito',1,0,'C',true);
					$this->Cell(50,7,'Docente',1,0,'C',true);
					$this->Cell(20,7,'Nota',1,0,'C',true);


					$this->Ln();
					$this->SetFillColor(224,235,255);
					$this->SetTextColor(0);


          $obj = new Consultas();
				  $datos = $obj->get_materia(2);
			   	$j=1;
				for ($i = 0; $i <sizeof($datos) ; $i++)
				{
		 		    $d=$datos[$i]['id_mat'];
         		$v=$_GET['id_alm'];
				    $notas = $obj->get_notas($v, $d);
          $this->SetFont('Arial','I',7);
          $this->Cell(10,5,$j,1,0,'C',false);
        if (!empty($notas[0]['docente'])){
                    $not = $notas[0]['docente'];
                    $docentes = $obj->get_docentes($not);
      				$this->Cell(30,5,$notas[0]['fecha'],1,0,'C',false);
							$this->Cell(60,5,$datos[$i]['descripcion'],1,0,'C',false);
							$this->Cell(20,5,$datos[$i]['creditos'],1,0,'C',false);
							$this->Cell(50,5,$docentes[0]['nombre'].' '.$docentes[0]['apellido'],1,0,'C',false);
							$this->Cell(20,5,$notas[0]['nota'],1,1,'C',false);


            } else {

                $this->Cell(30,5," ",1,0,'C',false);
                $this->Cell(60,5,$datos[$i]['descripcion'],1,0,'C',false);
                $this->Cell(20,5,$datos[$i]['creditos'],1,0,'C',false);
                $this->Cell(50,5," ",1,0,'C',false);
                $this->Cell(20,5," ",1,1,'C',false);

             }
               $this->Ln(0);

               $j++;
				}

	        $this->Ln();
					$this->SetFont('Arial','I',14);
					$this->Cell(40);
					$this->Cell(100,10,'LICENCIATURA EN TEOLOGIA',0,0,'C');

						$this->Ln();
						$this->SetFillColor(3,10,73);
					$this->SetTextColor(255);
					$this->SetDrawColor(100,100,100);
					$this->SetLineWidth(.3);
					$this->SetFont('Arial','B',7);
					$this->Cell(10,7,'N',1,0,'C',true);
					$this->Cell(30,7,'Fecha ',1,0,'C',true);
					$this->Cell(60,7,'Materia',1,0,'C',true);
					$this->Cell(20,7,'Credito',1,0,'C',true);
					$this->Cell(50,7,'Docente',1,0,'C',true);
					$this->Cell(20,7,'Nota',1,0,'C',true);


					$this->Ln();
					$this->SetFillColor(224,235,255);
					$this->SetTextColor(0);

          $obj = new Consultas();
				  $datos = $obj->get_materia(3);
			   	$j=1;
				for ($i = 0; $i <sizeof($datos) ; $i++)
				{
		 		    $d=$datos[$i]['id_mat'];
         		$v=$_GET['id_alm'];
				    $notas = $obj->get_notas($v, $d);
          $this->SetFont('Arial','I',7);
          $this->Cell(10,5,$j,1,0,'C',false);
        if (!empty($notas[0]['docente'])){
                    $not = $notas[0]['docente'];
                    $docentes = $obj->get_docentes($not);
      				$this->Cell(30,5,$notas[0]['fecha'],1,0,'C',false);
							$this->Cell(60,5,$datos[$i]['descripcion'],1,0,'C',false);
							$this->Cell(20,5,$datos[$i]['creditos'],1,0,'C',false);
							$this->Cell(50,5,$docentes[0]['nombre'].' '.$docentes[0]['apellido'],1,0,'C',false);
							$this->Cell(20,5,$notas[0]['nota'],1,1,'C',false);


            } else {

                $this->Cell(30,5," ",1,0,'C',false);
                $this->Cell(60,5,$datos[$i]['descripcion'],1,0,'C',false);
                $this->Cell(20,5,$datos[$i]['creditos'],1,0,'C',false);
                $this->Cell(50,5," ",1,0,'C',false);
                $this->Cell(20,5," ",1,1,'C',false);

             }
               $this->Ln(0);

               $j++;
				}



		}



		function PrintChapter()
		{
		    // Añadir capítulo
		    $this->AddPage();
			  $this->cabecera();
		    $this->Body();
		  	$this->FancyTable();


		}

}

//Creacion del Objeto de la clase heredada


//$datos = $obj->get_materia();
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->PrintChapter();
$pdf->SetFont('Times','',12);
$pdf->Output();


?>

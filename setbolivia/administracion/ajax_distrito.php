<?php
if(isset($_POST['id'])):
	require "../config/conexion.php";
  require "../modelos/Alumno.php";
	$nac=new Alumno();
	$provincias=$nac->listartodo("distritos");
	$html="";
	foreach ($provincias as $value)
		$html.="<option value='".$value['id_d']."'>".$value['opcion']."</option>";
	echo $html;
endif;

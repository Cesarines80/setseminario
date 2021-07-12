<?php
if(isset($_POST['id'])):
	require "../config/conexion.php";
  require "../modelos/Alumno.php";
	$nac=new Alumno();
	$ciudades=$nac->listarid("lista_estados", $_POST['id']);

	$html="";
	foreach ($ciudades as $value)
		$html.="<option value='".$value['id']."'>".$value['opcion']."</option>";
	echo $html;
endif;

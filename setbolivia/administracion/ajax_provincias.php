<?php
if(isset($_POST['id'])):
	require "../config/conexion.php";
  require "../modelos/Alumno.php";
	$nac=new Alumno();
	$provincias=$nac->listarid("lista_provincias",$_POST['id']);
	$html="";
	foreach ($provincias as $value)
		$html.="<option value='".$value['id']."'>".$value['opcion']."</option>";
	echo $html;
endif;

<?php
	$conexion= new mysqli("localhost", "setbolivia_seti", "Casimiro11#", "setbolivia_set");
	//Comprobar conexion
	if(mysqli_connect_errno())
	{
		printf("Fallo la conexion");
	}
	else {
		echo "Estas conectado";
	}
?>
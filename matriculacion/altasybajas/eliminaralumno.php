<?php 
require_once('../conexio.php');
require_once('../class/class.php');
//print_r($_GET);
//exit;
$obj = new actualizar();
$datos = $obj->eliminaralumno(); 
 ?>
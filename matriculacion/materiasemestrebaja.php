<?php 
require_once("class/class.php");
$obj = new actualizar();
$datos = $obj->editarapermateria($_GET['id']);
//print_r($_GET);
 ?>
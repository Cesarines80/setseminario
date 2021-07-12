<?php
$id = $_SESSION['id'];
require_once("../conexio.php");
require_once("../class/class.php");
//print_r($_GET);
$n = $_GET['desactivar'];
//echo $n;
//exit;
$obj = new actualizar();
$materia = $obj->cerrarmateria($n);


?>


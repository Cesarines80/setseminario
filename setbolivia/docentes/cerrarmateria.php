<?php

session_start();
if(!isset($_SESSION['id_doc'])){
  header("location: ../index.php");
}
//var_dump($_GET);

require_once('class.php');
$n = $_GET['desactivar'];
$obj = new Consultas();
$docente = $obj->cerrarmateria($n);



?>


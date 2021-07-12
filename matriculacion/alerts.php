<?php
require_once('session.php');
include'conexio.php';
require_once("class/class.php");
$not = ($_GET["d"]); 


$obj= new Consultas();
$usu = $obj->get_usuario($_SESSION['ides']);
 $d= $usu[0]['ciudad']; 
$datos = $obj->get_alumnociudad($d);

$mat = $obj->get_materia();
$docente = $obj->get_docente1();


if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_notas1();
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

<title>Ingrese Notas</title>
<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script type="text/javascript" language="javascript" src="js/valida.js"></script>
<script language="javascript" src="js/jquery.js"></script>

</head>

<body >
<?php 

      include "menuadmi.php";
   ?>

<div class="container">

<div id="row">
<div class="col-md-2">
  
</div>
<div class="col-md-8">
<div class="alert alert-danger" role="alert">
  <strong>Oh Error!</strong> Ya tiene nota y es: <?php echo $not; ?> en esta materia. 
   <input type="button" class="btn btn-warning"  name="boton3" id="boton3" value="Volver" onClick="history.back();" /> 

   

</div>
        

</div>
<div class="col-md-2">
  
</div>

</div>

</div>

</body>
</html>
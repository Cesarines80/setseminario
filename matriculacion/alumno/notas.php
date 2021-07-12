<?php
include "../session.php";
include'../conexio.php';
require_once("../class/class.php");


$obj= new Consultas();
$datos = $obj->get_materia1();
$datos1 =$obj->get_materia2();
$datos2=$obj->get_alumno1();
$datos3=$obj->get_materia3();
$datos4=$obj->get_materia4();
$datos5=$obj->get_materia5();
$datos6=$obj->get_materia6();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>
<link rel="stylesheet" href="../css/estyl.css" type="text/css" />
    <link rel="icon" href="../images/cogoplogo.ico" type="image/x-icon">
  </head>

<body>

<nav class="navbar navbar-fixed-top navbar-inverse ">
    <h3 align="center" class="fon" >SISTEMA DE INFORMACION SEMINARIO</h3>
  </nav>

    <nav class="navbar navbar-inverse  nav-shadow">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="adminalumno.php">PAGINA PRINCIPAL</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            <?php $ide=$_SESSION['ide']; ?>
             
              <li class="active" ><a href="semestre.php ?>">MATERIAS SEM.</a></li>
              <li class="active" ><a href="notas.php?alumno=<?php echo $ide;?>">KARDEX</a></li>
              
                <li class="active" ><a href="../cerrar_sesion.php">CERRAR SESION</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">

<div class="row">
<h2 align="center">Kardex del Estudiante</h2>
<div class="row">
<div class="col-md-12">
  <span class="label label-default">Nombre Completo:</span><strong> <?php echo $datos2[0]["nombre"]; echo " "; echo $datos2[0]["apellido"];  ?> </strong>
  
</div>
</div>
<div class="row">
<div class="col-md-12">
  <span class="label label-default">Iglesia:</span><strong> <?php echo $datos2[0]["miembro"]; ?>  </strong>
  
</div>
</div>
<div class="row">
<div class="col-md-12">
  <span class="label label-default">DISTRITO:</span><strong> <?php echo $datos2[0]["distrito"];  ?>  </strong>
  
</div>
</div>
<h3 align="center">DIPLOMA MINISTERIAL</h3>
<center>

  
  
  <table class="table" >
  <tr>
  <td width="47%">
  <table class="table table-hover table-condensed">
  <tr class="tabl" >
    <td width="12%">No</td>
    <td width="44%">MATERIAS</td>
    <td width="26%">CREDITOS</td>
    <td width="18%">NOTA</td>
    </tr>
    <?php
   
    for($i=0;$i<sizeof($datos);$i++)
    { 
  ?>
    <tr class="cont">
    <td ><?php echo $datos[$i]["id_mat"]; ?>&nbsp;</td>
    <td align="left"><?php echo $datos[$i]["descripcion"]; ?>&nbsp;</td>
    <td><?php echo $datos[$i]["creditos"];?>&nbsp;</td>
    <td>
    <?php 
     
    
  $sql="select * from notas_historial where id_alm='".$datos2[0]["id_alm"]."' and id_mat='".$datos[$i]["id_mat"]."'";
  
  $res=mysql_query($sql,$conexio);
  $reg = mysql_fetch_array($res); 

    echo $reg['nota'];  

 

   ?>
    
    &nbsp;</td>
    </tr>
  <?php
    
    }
  ?>
  </table>
  
  
  </td>
  <td width="6%"></td>
  <td width="47%">
  
   <table class="table table-hover table-condensed">
  <tr class="tabl" >
    <td width="12%">No</td>
    <td width="44%">MATERIAS</td>
    <td width="26%">CREDITOS</td>
    <td width="18%">NOTA</td>
    </tr>
    <?php
   
    for($i=0;$i<sizeof($datos1);$i++)
    { 
  ?>
    <tr class="cont">
    <td ><?php echo $datos1[$i]["id_mat"];?>&nbsp;</td>
    <td align="left"><?php echo $datos1[$i]["descripcion"]; ?>&nbsp;</td>
    <td><?php echo $datos1[$i]["creditos"];?>&nbsp;</td>
    <td>
    <?php 
  $sql1="select * from notas_historial where id_alm='".$datos2[0]["id_alm"]."' and id_mat='".$datos1[$i]["id_mat"]."'";
  $res1=mysql_query($sql1,$conexio);
  $reg1=mysql_fetch_array($res1);
  echo $reg1["nota"];
   ?>
    
    
    
    &nbsp;</td>
    </tr>
  <?php
    
    }
  ?>
  
  </table>
  
  </td>
  </tr>
  </table>
  <h3>TECNICO SUPERIOR EN TEOLOGIA</h3> 
<table class="table">
  <tr>
  <td width="47%">
  <table class="table table-hover table-condensed">
  <tr class="tabl" >
    <td width="12%">No</td>
    <td width="44%">MATERIAS</td>
    <td width="26%">CREDITOS</td>
    <td width="18%">NOTA</td>
    </tr>
    <?php
   
    for($i=0;$i<sizeof($datos3);$i++)
    { 
  ?>
    <tr class="cont">
    <td ><?php echo $datos3[$i]["id_mat"]; ?>&nbsp;</td>
    <td align="left"><?php echo $datos3[$i]["descripcion"]; ?>&nbsp;</td>
    <td><?php echo $datos3[$i]["creditos"];?>&nbsp;</td>
    <td>
    <?php 
  $sql="select * from notas_historial where id_alm='".$datos2[0]["id_alm"]."' and id_mat='".$datos3[$i]["id_mat"]."'";
  $res=mysql_query($sql,$conexio);
  $reg=mysql_fetch_array($res);
  echo $reg["nota"];
   ?>
    
    &nbsp;</td>
    </tr>
  <?php
    
    }
  ?>
  </table>
  
  
  </td>
  <td width="6%"></td>
  <td width="47%">
  
   <table class="table table-hover table-condensed">
  <tr class="tabl" >
    <td width="12%">No</td>
    <td width="44%">MATERIAS</td>
    <td width="26%">CREDITOS</td>
    <td width="18%">NOTA</td>
    </tr>
    <?php
   
    for($i=0;$i<sizeof($datos4);$i++)
    { 
  ?>
    <tr class="cont">
    <td ><?php echo $datos4[$i]["id_mat"];?>&nbsp;</td>
    <td align="left"><?php echo $datos4[$i]["descripcion"]; ?>&nbsp;</td>
    <td><?php echo $datos4[$i]["creditos"];?>&nbsp;</td>
    <td>
    <?php 
  $sql1="select * from notas_historial where id_alm='".$datos2[0]["id_alm"]."' and id_mat='".$datos4[$i]["id_mat"]."'";
  $res1=mysql_query($sql1,$conexio);
  $reg1=mysql_fetch_array($res1);
  echo $reg1["nota"];
   ?>
    
    
    
    &nbsp;</td>
    </tr>
  <?php
    
    }
  ?>
  
  </table>
  
  </td>
  </tr>
  </table>
<h3>CURSO FUNDAMENTAL</h3>
 
<table class="table">
  <tr>
  <td width="47%">
  <table class="table table-hover table-condensed">
  <tr class="tabl" >
    <td width="12%">No</td>
    <td width="44%">MATERIAS</td>
    <td width="26%">CREDITOS</td>
    <td width="18%">NOTA</td>
    </tr>
    <?php
   
    for($i=0;$i<sizeof($datos5);$i++)
    { 
  ?>
    <tr class="cont">
    <td ><?php echo $datos5[$i]["id_mat"]; ?>&nbsp;</td>
    <td align="left"><?php echo $datos5[$i]["descripcion"]; ?>&nbsp;</td>
    <td><?php echo $datos5[$i]["creditos"];?>&nbsp;</td>
    <td>
    <?php 
  $sql="select * from notas_historial where id_alm='".$datos2[0]["id_alm"]."' and id_mat='".$datos5[$i]["id_mat"]."'";
  $res=mysql_query($sql,$conexio);
  $reg=mysql_fetch_array($res);
  echo $reg["nota"];
   ?>
    
    &nbsp;</td>
    </tr>
  <?php
    
    }
  ?>
  </table>
  
  
  </td>
  <td width="6%"></td>
  <td width="47%">
  
   <!--<table class="table table-hover table-condensed">
  <tr class="tabl" >
    <td width="12%">No</td>
    <td width="44%">MATERIAS</td>
    <td width="26%">CREDITOS</td>
    <td width="18%">NOTA</td>
    </tr>
    <?php
   
    for($i=0;$i<sizeof($datos6);$i++)
    { 
  ?>
    <tr class="cont">
    <td ><?php echo $datos6[$i]["id_mat"];?>&nbsp;</td>
    <td align="left"><?php echo $datos6[$i]["descripcion"]; ?>&nbsp;</td>
    <td><?php echo $datos6[$i]["creditos"];?>&nbsp;</td>
    <td>
    <?php 
  $sql1="select * from notas_historial where id_alm='".$datos2[0]["id_alm"]."' and id_mat='".$datos6[$i]["id_mat"]."'";
  $res1=mysql_query($sql1,$conexio);
  $reg1=mysql_fetch_array($res1);
  echo $reg1["nota"];
   ?>
    
    
    
    &nbsp;</td>
    </tr>
  <?php
    
    }
  ?>
  
  </table>
-->  
  </td>
  </tr>
  </table>
  <br>
  <br>
  <a href="../pdf/kardex.php?id_alm=<?php echo $_GET["alumno"];?>" class="btn btn-success">Imprimir</a> 
<input type="button"  name="boton3" class="btn btn-warning" id="boton3" value="Volver" onClick="history.back();" />
</center>
<br>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>

</body>

</html>
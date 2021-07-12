<?php 
require_once("../conexio.php");

require_once("../PHPPaging.lib/PHPPaging.lib.php");
 include "../session.php";
 $id = $_SESSION['id'];
 $ide = $_GET['id_mat'];
 
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from registro where id_mat= $ide  and activo = 1");
$pagina->ejecutar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

    
  </head>

  <body>
 
 <?php include "menudocente.php"; ?>
<div class="container " >


<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="../admindocente.php?id=<?php echo $_SESSION['id'];?>">Regresar</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>LISTA DE ALUMNOS</h1>

  <table border="0" class="table table-bordered table-hover ">

    <thead ><tr>
      <td>Nro.</td>
      <td>ALUMNO</td>
      <td >Materia</td>

      <td>CARRERA</td>

      <td>CREDITO</td>
     

     

  <td>Notas</td>

   <!--       <td>Editar</td>

      <td>Eliminar</td>
-->
   	 </tr></thead>

    

      <tbody>
<?php 
$i=1;
while($res=$pagina->fetchResultado()){

$obj =  new Consultas();
$datos = $obj->get_materiaingactiva($res['id_mat']);
$datos2 = $obj->get_grado1($datos[0]['id_grado']);
$datos3 = $obj->get_alumno2($res['id_alm']);
$datos4 = $obj->get_notas_historial($res['id_mat'],$res['id_alm']);

 ?>
      <tr>
        <td > <?php echo $i; ?></td>
          <td><?php echo $datos3[0]['nombre']; ?> <?php echo $datos3[0]['apellido']; ?></td>
       
        <td><?php echo $datos[0]['descripcion']; ?></td>

        <td><?php echo $datos2[0]['nivel']; ?></td>

        <td><?php echo  $datos[0]['creditos']; ?></td>


      
        
    <?php if ($datos4[1]['nota']==0) {
      ?>
      <td><a href="ingrenota.php?id_mat=<?php echo $res['id_mat']; ?>&id_alm=<?php echo $res['id_alm']; ?>"><img src="../images/images.jpg" width="25" height="25" alt="Editar" border="0"/></a></td>
      <?php
    }else{

      ?>
       <td><?php echo  $datos4[1]['nota']; ?></td>
      <?php
    }
     ?>
    
   
<!--
    <td><a href="docente.php?borrar=<?php echo $row_docentes['id_docente'];?>"><img src="../images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>
-->
      </tr>

    <?php 
$i++;
}
           ?>
  
   </tbody>
  </table>

</div>

      
 </div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-2"></div>
<div class="col-md-1"></div>
<div class="col-md-" class="pagination"><?php
echo 'Paginas '.$pagina->fetchNavegacion();
 ?></div>
<div class="col-md-2"></div>
<div class="col-md-2"></div>
  



</div>

</div> <!-- /container -->


    
    <?php include "footer.php" ?>
  </body>
</html>
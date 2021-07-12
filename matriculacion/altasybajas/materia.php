<?php require_once("../conexio.php");
require_once("../PHPPaging.lib/PHPPaging.lib.php");
require_once('../class/class.php');
 
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from materias where estado = 1");
$pagina->ejecutar();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>
<script  type="text/javascript" >
   function aviso(url){
if (!confirm("ALERTA!! va a proceder a eliminar este registro,\n Confirme en OK o en CANCELAR.")) {
return false;
}
else {
document.location = url;
return true;
}
}
</script>
    
  </head>

  <body>
 
 <?php include "menuadmi.php"; ?>
<div class="container " >


<div class="row">
<div class="col-md-2">
  <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Acciones</h3>
            </div>
            <div class="panel-body">
              <p><a href="ingmaterias.php">Alta de Materia</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>LISTA DE MATERIAS</h1>

  <table border="0" class="table table-bordered table-hover ">

    <thead ><tr>

      <td >SIGLA</td>

      <td>DESCRIPCION</td>

      <td>CREDITO</td>

      <td>CARRERA</td>

      

      <td>Editar</td>

      <td>Eliminar</td>

   	 </tr></thead>

    

      <tbody>
<?php 
$i=1;
while($res=$pagina->fetchResultado()){

$obj = new Consultas();
$datos = $obj->get_grado1($res['id_grado']);

 ?>
      <tr>

       
        <td><?php echo $res['sigla']; ?></td>

        <td><?php echo $res['descripcion']; ?></td>

        <td><?php echo $res['creditos']; ?></td>

        <td><?php echo $datos[0]['nivel']; ?></td>

    

    <td><a href="esitarmateria.php?id_mat=<?php echo $res['id_mat']; ?>"><img src="../images/glassy-blue-edit-icon-thumb7099653.jpg" width="25" height="25" alt="Editar" border="0"/></a></td>

    <td>
 <a href="javascript:;" onclick="aviso('eliminarmateria.php?borrar=<?php echo $res['id_mat'];?>'); return false;">
   <img src="../images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>

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
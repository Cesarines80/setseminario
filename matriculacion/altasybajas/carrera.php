<?php require_once("../conexio.php");
require_once("../PHPPaging.lib/PHPPaging.lib.php");
 
  $pagina = new PHPPaging;
$pagina->agregarConsulta("select * from grado_academico where activo = 1");
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
              <p><a href="ingresarcarrera.php">Alta de Carrera</a></p>
            </div>
          </div>

</div>
<div class="col-md-10">
  <h1>LISTA DE CARRERA</h1>

  <table border="0" class="table table-bordered table-hover ">

    <thead ><tr>

      <td >ID</td>

      <td>CARRERA</td>


     

      <td>Editar</td>

      <td>Eliminar</td>

   	 </tr></thead>

    

      <tbody>

<?php 
$i=1;
while($res=$pagina->fetchResultado()){



 ?>
      <tr>

       
        
        <td><?php echo $res['id_grado']; ?></td>

        <td><?php echo $res['nivel']; ?></td>

    

    <td><a href="editarcarrera.php?id_grado=<?php echo $res['id_grado']; ?>"><img src="../images/glassy-blue-edit-icon-thumb7099653.jpg" width="25" height="25" alt="Editar" border="0"/></a></td>

    <td>
    <a href="javascript:;" onclick="aviso('eliminarcarrera.php?borrar=<?php echo $res['id_grado'];?>'); return false;"><img src="../images/pocket-killbox_icon.png" width="25" height="25" alt="Eliminar" border="0"/></a></td>

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
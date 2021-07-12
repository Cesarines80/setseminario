<?php
	require_once ("../config/db.php");
	require_once ("../config/conexion.php");
	require_once ("../../class/class.php");
?>

<?php
$obj = new Consultas();
$usu = $obj->get_usuario($_SESSION['ides']);
 $d= $usu[0]['ciudad']; 
			
$action='ajax';
	if($action == 'ajax'){
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
		  $sTable = "docentes";
		 $sWhere = "";
		 $sWhere.="WHERE activo=1 and departamento=$d";
		if ( $_GET['q'] != "" )
		{
		$sWhere.= " and nombre like '%$q%' or apellido like '%$q%'";
			
		}
		
		$sWhere.=" order by nombre asc";
		include 'pagination.php'; //include pagination file
		//pagination variables
		$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
		$per_page = 15 ; //how much records you want to show1
		$adjacents  = 4; //gap between pages after number of adjacents
		$offset = ($page - 1) * $per_page;
		//Count the total number of row in your table*/
		$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
		$row= mysqli_fetch_array($count_query);
		$numrows = $row['numrows'];
		$total_pages = ceil($numrows/$per_page);
		$reload = './docente.php';
		//main query to fetch the data
		$sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
		$query = mysqli_query($con, $sql);
		//loop through fetched data
		if ($numrows>0){
			echo mysqli_error($con);
			?>
			<div class="table-responsive ">
			  <table class="table table-hover" style="border-color: #337ab7;">
				<tr style="color: #fff; background-color: #337ab7; border-color: #337ab7;">
					<th>ID</th>
					<th>NOMBRES</th>
					<th>CORREO</th>
					<th>TELEFONO</th>
					<th>ACCIONES</th>
				</tr>
				<?php
				while ($row=mysqli_fetch_array($query)){
						$id=$row['id_doc'];
						$nombres=$row['nombre'];
						$apellidos=$row['apellido'];
						$correo=$row['email'];
						$celular=$row['celular'];
		
					?>
					<tr>
						<td><?php echo utf8_encode($id); ?></td>
						<td><?php echo utf8_encode($nombres); ?> <?php echo utf8_encode($apellidos);?></td>
						<td><?php echo utf8_encode($correo);?></td>
						<td><?php echo utf8_encode($celular); ?></td>	
						<td><?php echo "
      <button type=\"button\" class=\"btn btn-info btn-xs\" onclick=\"location='editardocente.php?id_doc=$id'\"><span class=\"glyphicon glyphicon-pencil\"></span> Editar</button> 
      |";?>
         
        <button type="button" class="btn btn-danger btn-xs" onclick="aviso('eliminardocente.php?borrar=<?php echo $id ;?>'); return false;"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>
      </div></td>					
					</tr>
					<?php
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right"><?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			  </table>
			</div>
			<?php
		}
	}
?>
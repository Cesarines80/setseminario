<?php
require_once("../config/db.php");
require_once("../config/conexion.php");
require_once("../class/class.php");
?>

<?php
$d = $_SESSION['ides'];
$objetos = new Consultas();
$usuario = $objetos->get_usuarioselect($d);
$ciudadusu = $usuario[0]['ciudad'];
//var_dump($ciudadusu);
//exit;
$action = 'ajax';
if ($action == 'ajax') {
	$q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$sTable = "alumnos";
	$sWhere = "";
	$sWhere .= "WHERE estado = 1 and ciudad = $ciudadusu and act_sem = 1";
	if ($_GET['q'] != "") {
		$sWhere .= " and nombre like '%$q%' or apellido like '%$q%'";
	}

	$sWhere .= " order by nombre asc";
	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = 20; //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
	$row = mysqli_fetch_array($count_query);
	$numrows = $row['numrows'];
	$total_pages = ceil($numrows / $per_page);
	$reload = './alumnos.php';
	//main query to fetch the data
	$sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
	$query = mysqli_query($con, $sql);
	//loop through fetched data
	if ($numrows > 0) {
		echo mysqli_error($con);
?>
		<div class="table-responsive ">
			<table class="table table-hover" style="border-color: #337ab7;">
				<tr style="color: #fff; background-color: #337ab7; border-color: #337ab7;">
					<th>ID</th>
					<th>NOMBRES</th>
					<th>CORREO</th>
					<th>TELEFONO</th>
					
				</tr>
				<?php
				$i = 1;
				while ($row = mysqli_fetch_array($query)) {
					$id = $row['id_alm'];
					$nombres = $row['nombre'];
					$apellidos = $row['apellido'];
					$correo = $row['email'];
					$celular = $row['celular'];

				?>
					<tr>
						<td><?php echo utf8_encode($i); ?></td>
						<td><?php echo utf8_encode($nombres); ?> <?php echo utf8_encode($apellidos); ?></td>
						<td><?php echo utf8_encode($correo); ?></td>
						<td><?php echo utf8_encode($celular); ?></td>
						
					</tr>

				<?php
					$i++;
				}
				?>
				<tr>
					<td colspan=7><span class="pull-right">
							<?
					 echo paginate($reload, $page, $total_pages, $adjacents);
					?></span></td>
				</tr>
			</table>
		</div>
<?php
	}
}
?>
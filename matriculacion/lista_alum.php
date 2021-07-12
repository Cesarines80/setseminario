<?php 
require_once("../conexio.php");
require_once("class/paginacion.php");

//print_r($_POST);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista de Alumnos</title>
<link href="css/estyl.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<script type="text/javascript" language="javascript" src="js/valida.js"></script>


</head>

<body>

<div id="contenedor">
<div id="header"><?php require_once("header.php"); ?></div>
<div id="content">
<?php require_once("datos.php"); ?>


<?php
	
	//Realizamos la conexion a la BD
		$query = "SELECT * FROM alumnos";
	$rsT =  mysql_query($query, $conexio);
	$total = mysql_num_rows($rsT);
	
	$pg = $_GET['page'];
	$cantidad = 4; //Cantidad de registros que se desea mostrar por pagina
	//Para probar solo le coloque 3
	
	$paginacion = new paginacion($cantidad, $pg);
	$desde = $paginacion->getFrom();
	if($_POST["grupo"]=='si')
{
	$query = "SELECT * FROM alumnos  LIMIT $desde, $cantidad";
	$rs = mysql_query($query, $conexio);
	$j=1;
	
	}else
{
	$query = "SELECT * FROM registro where `id_grupo`='".$_POST["grupo"]."'  LIMIT $desde, $cantidad";
	$rs = mysql_query($query, $conexio);
	$rsx = mysql_query($query, $conexio);
	$row2=mysql_num_rows($rsx);
	//$row3=mysql_fetch_array($rs);
	
	
	}

	
?>
     <?php 
	 if($j == 1)
	 {
	 
	 ?>
     <h1 align="center">Lista General</h1>
	<?php
	 }else
	 {
		 $query3 = "SELECT * FROM grupos where `id_grupo`='".$_POST["grupo"]."'";
	$rs3 = mysql_query($query3, $conexio);
	$reg = mysql_fetch_array($rs3);
	
	 ?>
     <h1 align="center"><font color="#000033">Grupo:</font> <?php echo $reg["nombre"]?></h1>
     
     <?php 
	 }
	 ?>
			    <table width="80%" border="0" cellspacing="1" cellpadding="0">
			  <tr class="marco">
			    <td width="23%">Nombre&nbsp;</td>
			    <td width="23%">Telefono&nbsp;</td>
			    <td width="23%">E-mail&nbsp;</td>
			    <td width="23%">C.I.&nbsp;</td>
			    <td width="8%"colspan="2">Funciones</td>
			    </tr>
			  
			 


			<?php
				while ($row = mysql_fetch_assoc($rs)) {
				?>
			    <?php
				$query1 = "SELECT * FROM alumnos  where `id_alm`='".$row["id_alm"]."'";
				$res = mysql_query($query1, $conexio);
				$row1=mysql_fetch_array($res);
				
				?>
			    
				 <tr class="marco1">
			    <td>	
					
					<?php echo $row1['nombre']." ".$row1['apellido']; ?>
			 &nbsp;</td>
			    <td><?php echo $row1['telefono']; ?>&nbsp;</td>
			    <td><?php echo $row1['email']; ?>&nbsp;</td>
			    <td><?php echo $row1['c_i']; ?>&nbsp;</td>
			    <td width="4%"><a href="#"  title="Editar"><img src="ima/editar.png" width="20" height="20"  border="0" /></a></td>
			    <td width="4%"><a href="#" title="Eliminar"><img src="ima/logout1.png" width="20" height="20" border="0"  /></a></td>
			  </tr>
			<?php
				
				}
				
				
			?>
			<tr>
			<td colspan="6" align="center">
			<?php 
				if($row2 == '0')
				{
					echo "<h3>NO Existe Alumnos en dicho Grupo</h3>";
					}
				


			?>

			</td>
			</tr>

			</table>	
<br />
<center>

		<table>
		<tr>
		<td>
			<div class="paginacion">
		<?php
			$url = "lista_alum.php?";
			//Si se desea pasar otros parámetros se hace así
			//(Ejemplo) $url = "ejemploPaginacion.php?catLibro=$idCat"
			
			$classCss = "numPages";
			//Clase CSS que queremos asignarle a los links 
			
			$back = "&laquo;Atras";
			$next = "Siguiente&raquo;";
			
			$paginacion->generaPaginacion($total, $back, $next, $url, $classCss);
		?>
			</div>
		    </td>
		</tr>
		</table>


<input type="button"  name="boton3" id="boton3" value="Volver" onClick="history.back();" />
</center>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>
	
</body>
</html>

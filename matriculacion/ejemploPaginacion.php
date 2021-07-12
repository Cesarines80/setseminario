<?php 
require_once("../conexio.php");
require_once("class/paginacion.php");
$i=2;
print_r($_POST);
if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_grupos();
  exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lista de Alumnos</title>
<link href="css/estyl.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php
	
	//Realizamos la conexion a la BD
		$query = "SELECT * FROM alumnos";
	$rsT =  mysql_query($query, $conexio);
	$total = mysql_num_rows($rsT);
	
	$pg = $_GET['page'];
	$cantidad = 1; //Cantidad de registros que se desea mostrar por pagina
	//Para probar solo le coloque 3
	
	$paginacion = new paginacion($cantidad, $pg);
	$desde = $paginacion->getFrom();
	if($i==1)
{
	$query = "SELECT * FROM alumnos  LIMIT $desde, $cantidad";
	$rs = mysql_query($query, $conexio);
	
	
	}else
{
	$query = "SELECT * FROM alumnos  LIMIT $desde, $cantidad";
	$rs = mysql_query($query, $conexio);
	
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
	 <tr class="marco1">
    <td>	
		
		<?php echo $row['nombre']." ".$row['apellido']; ?>
 &nbsp;</td>
    <td><?php echo $row['telefono']; ?>&nbsp;</td>
    <td><?php echo $row['email']; ?>&nbsp;</td>
    <td><?php echo $row['c_i']; ?>&nbsp;</td>
    <td width="4%"><a href="#"  title="Editar"><img src="ima/editar.png" width="20" height="20"  border="0" /></a></td>
    <td width="4%"><a href="#" title="Eliminar"><img src="ima/logout1.png" width="20" height="20" border="0"  /></a></td>
  </tr>
<?php
	}
?>
</table>	
<br />
<center>
<table>
<tr>
<td>
	<div class="paginacion">
<?php
	$url = "ejemploPaginacion.php?";
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
</center>
	
</body>
</html>

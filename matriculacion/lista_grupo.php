<?php
include'../conexio.php';
require_once("class/class.php");

$obj= new Consultas();
$datos = $obj->get_grupos();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registro de </title>
<link type="text/css" rel="stylesheet" href="dhtmlgoodies_calendar/dhtmlgoodies_calendar.css?random=20051112" media="screen"></LINK>
	<SCRIPT type="text/javascript" src="dhtmlgoodies_calendar/dhtmlgoodies_calendar.js?random=20060118"></script>

<link rel="stylesheet" type="text/css" href="css/estyl.css">
<script type="text/javascript" language="javascript" src="js/valida.js"></script>
</head>

<body onLoad="limpiar();">


<div id="contenedor">
<div id="header"><?php require_once("header.php"); ?></div>
<div id="content">
<?php require_once("datos.php"); ?>
<form name="form" action="lista_alum.php" method="post" enctype="multipart/form-data">
<table width="40%" border="0" cellspacing="1" cellpadding="0">
  <tr>
  <td colspan="2" align="center"><h2>Crear Grupos</h2>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="31%" class="tab"> Seleccione Grupo</td>
    <td width="24%"><select name="grupo">
     <option value="0">Selec.. Grupo</option>
     <option value="si">Toda la Lista</option>
	<?php 
	for($i=0;$i<sizeof($datos); $i++)
	{
	?>
      <option value="<?php echo $datos[$i]["id_grupo"]; ?>"><?php echo $datos[$i]["nombre"]; ?></option>
    <?php 
	}
	?>
    </select></td>
  <td width="45%"><div id="grupo"></div></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <td align="right" valign="top"><input type="button"  name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />&nbsp;</td>
  <td><input id="boton" type="submit" name="Ver" value="Ver" title="Ver" >&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
  
</table>



</form>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>

</body>
</html>
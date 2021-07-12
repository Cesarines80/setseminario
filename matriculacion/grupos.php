<?php
include'../conexio.php';
require_once("class/class.php");

if(isset($_POST) and $_POST["grabar"]=="si")
{   
$obj1= new Ingresar();
$datos1 = $obj1->post_grupos();
  exit;
}

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
<form name="form" action="" method="post" enctype="multipart/form-data">
<table width="40%" border="0" cellspacing="1" cellpadding="0">
  <tr>
  <td colspan="2" align="center"><h2>Crear Grupos</h2>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="24%" class="tab">* Ingrese Grupo</td>
    <td width="31%"><input type="text" name="grupo"></td>
  <td width="45%"><div id="grupo"></div></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr><input type="hidden" name="grabar" value="si" />
  <td align="right" valign="top"><input type="button"  name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />&nbsp;</td>
  <td><input id="boton" type="button" name="Registrarr" value="Registrar" title="Registrar" onClick="valida_grupos();">&nbsp;</td>
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
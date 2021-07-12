s<?php
require_once("class/class.php");
$obj = new Consultas();
$datos = $obj->get_alumno(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Busqueda de un Alumno</title>
<link type="text/css" rel="stylesheet" href="css/estyl.css"
</head>

<body>

<div id="contenedor">
<div id="header"><?php require_once("header.php"); ?></div>
<div id="content">
<?php require_once("datos.php"); ?>
<center>
<h2>Seleccione un Alumno</h2>
<form name="form" method="post" action="historial.php" enctype="multipart/form-data">
<label>Busqueda de Alumno:</label>
<select name="alumno">
<option value="0">Selec..Alumno</option>
<?php
for($i=0;$i<sizeof($datos); $i++)
{
?>
<option value="<?php echo $datos[$i]["id_alm"]; ?>"><?php echo $datos[$i]["nombre"]; echo " "; echo $datos[$i]["apellido"]; ?></option>
<?php
}
?>
</select>
<input type="submit" name="Ver" value="ver" title="Ver" />
<input type="button"  name="boton3" id="boton3" value="Cancelar" onClick="history.back();" />
</form>
</center>
<br>
</div>
<div id="footer"><?php require_once("footer.php"); ?></div>
</div>

</body>
</html>
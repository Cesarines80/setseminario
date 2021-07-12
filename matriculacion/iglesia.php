<?php
require_once("../conexio.php");
//print_r($_GET);
//$sql="select * from comuna where ciudad = ".$_GET["id"]."";
$sql="select * from iglesia where distrito=".$_GET["id"];
$res=mysql_query($sql,$conexio);
?>

<select name="iglesia" class="form-control" onchange="from(document.form.iglesia.value,'txt_pas','pasto.php')">
<option value="0">Selec. Iglesia.</option>

<?php
while ($reg=mysql_fetch_array($res))
{
?>
<option value="<?php echo $reg["id_i"];?>"><?php echo $reg["igle"];?></option>
<?php
}
?>

</select>
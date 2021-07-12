<?php
session_start();
require_once("conexio.php");
$id_pas=$_SESSION["id_pas"];
$sql1="select *from inf_lugarnac where id_pas='$id_pas'";
$res1=mysql_query($sql1, $conexio);
$reg1=mysql_fetch_array($res1);

//echo $id_pas;

//print_r($_GET);
$sql="select * from lista_estados where relacion=".$_GET["id"]."";
$res=mysql_query($sql,$conexio);

?>





<select  name="ciudad" class="form-control"  onchange="from(document.form.ciudad.value,'provincia','../provincia.php')" >
<option value="0">Selec. Ciudad</option>

<?php
while ($reg=mysql_fetch_array($res))
{
?>
<option value="<?php echo $reg["id"];?>" ><?php echo $reg["opcion"];?></option>
<?php
}
?>

</select>


<?php
require_once("../conexio.php");
sleep(2);
$sql="select c_i from alumnos where c_i='".$_GET["id"]."'";
$res=mysql_query($sql,$conexio);
if (mysql_num_rows($res)==0)
{
	echo "no";
}else
{
	echo "si";
}
?>
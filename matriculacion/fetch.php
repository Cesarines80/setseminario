<?php
//fetch.php
$connect = mysqli_connect("localhost", "setboliv_setbo", "Casimiro11", "setboliv_set");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "  SELECT * FROM alumnos WHERE nombre LIKE '%$request%' OR  apellido LIKE '%$request%'";

$result = mysqli_query($connect, $query);

$data = array();
$data1 = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
 	$d = " ";
  $data[] = $row["nombre"] .$d. $row["apellido"];
  
 }
 echo json_encode($data); 
}

?>

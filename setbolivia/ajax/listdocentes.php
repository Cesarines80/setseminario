<?php
session_start();
require_once "../modelos/Listdocentes.php";



$sem = new Listadocentes();
$d = $_SESSION['id'];

$usuciu = $sem->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;


$id = isset($_POST["id"])?limpiarCadena($_POST["id"]):"";
//var_dump($id_alm);
$semestre = isset($_POST["semestre"])?limpiarCadena($_POST["semestre"]):"";
$fechainicio = isset($_POST["fechainicio"])?limpiarCadena($_POST["fechainicio"]):"";
$fechafinal = isset($_POST["fechafinal"])?limpiarCadena($_POST["fechafinal"]):"";
$id_depto = isset($_POST["id_depto"])?limpiarCadena($_POST["id_depto"]):"";
$id_usu = isset($_POST["id_usu"])?limpiarCadena($_POST["id_usu"]):"";
$activo = '1';

switch ($_GET["op"]) {


    case 'listar':



            $rspta = $sem->listar($de);

            //Vamos a declarar un array
            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>$reg->nombre,
                    "1"=>$reg->apellido,
                    "2"=>$reg->materia,
                    "3"=>$reg->grado



                );
            }
            $results = array(
                "sEcho"=>1, //Informacion para el datatables
                "iTotalRecords"=>count($data),//enviamos el total registros al datatables
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
        break;

}


?>

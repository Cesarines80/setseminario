<?php
session_start();
require_once "../modelos/Materia.php";



$materia = new Materia();
$d = $_SESSION['id'];

$usuciu = $materia->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;


$id_aper = isset($_POST["id_aper"])?limpiarCadena($_POST["id_aper"]):"";
$id_grado = isset($_POST["id_grado"])?limpiarCadena($_POST["id_grado"]):"";
//var_dump($id_alm);
$id_materia = isset($_POST["id_materia"])?limpiarCadena($_POST["id_materia"]):"";
$id_depto = isset($_POST["id_depto"])?limpiarCadena($_POST["id_depto"]):"";
$id_usu = isset($_POST["id_usu"])?limpiarCadena($_POST["id_usu"]):"";
$id_doce = isset($_POST["id_doce"])?limpiarCadena($_POST["id_doce"]):"";
$fecha = isset($_POST["fecha"])?limpiarCadena($_POST["fecha"]):"";
$semestre = isset($_POST["semestre"])?limpiarCadena($_POST["semestre"]):"";
$activo = '1';

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (empty($id_aper)) {
            $rspta = $materia->insertar($id_materia, $de, $d, $id_doce, $fecha, $semestre, $activo);

            echo $rspta? "Materia registrado":"Materia no se pudo registrar";
        }else {
          $rspta = $materia->editar($id_aper, $id_materia, $de, $d, $id_doce, $fecha, $semestre, $activo);

            echo $rspta ? "Materia Actualizado":"Materia no se pudo actualizar";

        }


        break;
    case 'desactivar':
            $rspta = $materia->desactivar($id_aper);
            echo $rspta ? "Materia Desactivado":"Materia no se puede desactivar";
        break;
    case 'activar':
        $rspta = $materia->activar($id_aper);
        echo $rspta ? "Materia Activada":"Materia no se puede activar";
        break;
    case 'mostrar':
            $rspta = $materia->mostrar($id_aper);
            //Codificar el resultado utilizando json

            echo json_encode($rspta);
        break;
    case 'listar':



            $rspta = $materia->listar($de);

            //Vamos a declarar un array
            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->activo) ?'<buton class="btn btn-warning" id="mostrar" onclick="mostrar('.$reg->id_aper.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-danger" onclick="desactivar('.$reg->id_aper.')"><i class="fa fa-close"></i></buton>':
                    '<buton class="btn btn-warning" onclick="mostrar('.$reg->id_aper.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-primary" onclick="activar('.$reg->id_aper.')"><i class="fa fa-check"></i></buton>',
                    "1"=>$reg->fecha,
                    "2"=>$reg->materia,
                    "3"=>$reg->grado,
                    "4"=>$reg->semestre,
                    "5"=>$reg->nombre.' '.$reg->apellido,
                    "6"=>($reg->activo)?'<span class="label bg-success">Activada</span>':
                    '<span class="label bg-red">Desactivada</span>'

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

        case 'grado':

          $rspta = $materia->listargrado("grado_academico");
          echo  '<option value=""></option>';
          while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->id_grado.'>'.$reg->nivel.'</option>';
          }
        break;
        case 'materias':

          $rspta = $materia->listarmaterias($id_grado);
          echo  '<option value=""></option>';
          while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->id_mat.'>'.$reg->descripcion.'</option>';
          }
        break;
        case 'docente':
          echo  '<option value=""></option>';
          $rspta = $materia->docenteciudad($de);

          while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->id_doc.'>'.$reg->nombre.' '.$reg->apellido.'</option>';
          }
        break;
        case 'semestre':
          echo  '<option value=""></option>';
          $rspta = $materia->semestreciudad($de);

          while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->id.'>'.$reg->semestre.'</option>';
          }
        break;



}


?>

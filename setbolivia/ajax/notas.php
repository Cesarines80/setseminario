<?php
session_start();
require_once "../modelos/Notas.php";



$notas = new Notas();
$d = $_SESSION['id'];
$usuciu = $notas->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;

$id_his = isset($_POST["id_his"])?limpiarCadena($_POST["id_his"]):"";
//var_dump($id_alm);
$id_alm = isset($_POST["id_alm"])?limpiarCadena($_POST["id_alm"]):"";
$id_mat = isset($_POST["id_mat"])?limpiarCadena($_POST["id_mat"]):"";
$nota = isset($_POST["nota"])?limpiarCadena($_POST["nota"]):"";
$fecha = isset($_POST["fecha"])?limpiarCadena($_POST["fecha"]):"";
$id_reg = isset($_POST["id_reg"])?limpiarCadena($_POST["id_reg"]):"";
$docente = isset($_POST["docente"])?limpiarCadena($_POST["docente"]):"";
$activo = '0';

switch ($_GET["op"]) {
    case 'guardaryeditar':

        if (empty($id_his)) {
            $rspta = $notas->insertar($id_alm, $id_mat, $nota, $fecha, $id_reg, $docente, $activo);

            echo $rspta? "Nota registrado":"Nota no se pudo registrar";
        }else {
          $rspta = $notas->editar($id_his, $id_alm, $id_mat, $nota, $fecha, $id_reg, $docente, $activo);

            echo $rspta ? "Nota Actualizado":"Nota no se pudo actualizar";

        }


        break;
    case 'desactivar':
            $rspta = $notas->desactivar($id_his);
            echo $rspta ? "Nota Desactivado":"Nota no se puede desactivar";
        break;
    case 'activar':
        $rspta = $notas->activar($id_his);
        echo $rspta ? "Nota Activada":"Nota no se puede activar";
        break;
    case 'mostrar':
            $rspta = $notas->mostrar($id_his);
            //Codificar el resultado utilizando json

            echo json_encode($rspta);
        break;
    case 'listar':



            $rspta = $notas->listar($de);

            //Vamos a declarar un array
            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->activo) ?'<buton class="btn btn-warning" id="mostrar" onclick="mostrar('.$reg->id_his.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-danger" onclick="desactivar('.$reg->id_his.')"><i class="fa fa-close"></i></buton>':
                    '<buton class="btn btn-warning" onclick="mostrar('.$reg->id_his.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-primary" onclick="activar('.$reg->id_his.')"><i class="fa fa-check"></i></buton>',
                    "1"=>$reg->fecha,
                    "2"=>$reg->nota,
                    "3"=>$reg->materia,
                    "4"=>$reg->alumnono .' '.$reg->alumnoap,
                    "5"=>$reg->docenteno .' '.$reg->docenteap,
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
        case 'selectPais':
            $rspta = $notas->listartodo("lista_paises");

            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->opcion.'</option>';
            }
          break;

          case 'selectCiudad':

            $rspta = $notas->listartodo("ciudades");

            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id.'>'.$reg->nombre.'</option>';
            }
          break;

          case 'alumnos':

            $rspta = $notas->alumnociudad($de);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_alm.'>'.$reg->nombre.' '.$reg->apellido.'</option>';
            }
          break;

          case 'docentes':

            $rspta = $notas->docenteciudad($de);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_doc.'>'.$reg->nombre.' '.$reg->apellido.'</option>';
            }
          break;
          case 'materias':

            $rspta = $notas->listartodo("materias");
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_mat.'>'.$reg->descripcion.'</option>';
            }
          break;


          case 'alumnosciudad':

            $rspta = $notas->alumnociudad($id);
            echo  '<option value=""></option>';
            while ($reg = $rspta->fetch_object()) {
              echo '<option value='.$reg->id_d.'>'.$reg->opcion.'</option>';
            }
          break;

          case 'verifica':

            $rspta = $notas->verifica($id_alm, $id_mat);

              while ($reg = $rspta->fetch_object())
              {
                echo $reg->nota;
              }

          break;



}


?>

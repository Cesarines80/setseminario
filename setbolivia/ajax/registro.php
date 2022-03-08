<?php
session_start();
require_once "../modelos/Registro.php";



$registro = new Registro();
$d = $_SESSION['id'];

$usuciu = $registro->usuci("usuario", $d);
$reg = $usuciu->fetch_object();
$de=$reg->ciudad;


$id_reg = isset($_POST["id_reg"])?limpiarCadena($_POST["id_reg"]):"";
$id_his = isset($_POST["id_his"])?limpiarCadena($_POST["id_his"]):"";
$ide = isset($_GET["ide"])?limpiarCadena($_GET["ide"]):"";
$id_aper = $_POST["id_aper"];
$idaper = $id_aper[0];
$id_alm = isset($_POST["id_alm"])?limpiarCadena($_POST["id_alm"]):"";
$id_mat = isset($_POST["id_mat"])?limpiarCadena($_POST["id_mat"]):"";

$fecha = isset($_POST["fecha"])?limpiarCadena($_POST["fecha"]):"";
$id_doc = isset($_POST["id_doc"])?limpiarCadena($_POST["id_doc"]):"";
$id_grupo = isset($_POST["id_grupo"])?limpiarCadena($_POST["id_grupo"]):"";
$id_ciudad = isset($_POST["id_ciudad"])?limpiarCadena($_POST["id_ciudad"]):"";
$activo = '1';

switch ($_GET["op"]) {
    case 'guardaryeditar':
      $apertura = $registro->listaraper($idaper);
      $otra= $apertura->fetch_object();
      $semestre =$otra->id_sem;
     //  var_dump($semestre);
         if (empty($id_reg)) {



             $rspta = $registro->insertar($id_alm, $id_aper, $fecha, $id_doc, $semestre, $de, $activo);
            echo $rspta? "Registro Ingresado":"Registro no se pudo ingresar";
        }else {
          $rspta = $registro->editar($id_reg, $id_alm, $id_mat, $fecha, $id_doc, $id_grupo, $id_ciudad, $activo);

            echo $rspta ? "Registro Actualizado":"Registro no se pudo actualizar";

        }


        break;
    case 'desactivar':
            $rspta = $registro->desactivar($id_reg);
            echo $rspta ? "Registro Desactivado":"Registro no se puede desactivar";
        break;
    case 'activar':
        $rspta = $registro->activar($id_reg);
        echo $rspta ? "Registro Activada":"Registro no se puede activar";
        break;
    case 'mostrar':
            $rspta = $registro->mostrar($id_reg);
            //Codificar el resultado utilizando json

            echo json_encode($rspta);
        break;
        case 'alumnos':
          require_once "../modelos/Notas.php";
          $notas=new Notas();
          $rspta = $notas->alumnociudad($de);
            echo  '<option value=""></option>';
          while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->id_alm.'>'.$reg->nombre.' '.$reg->apellido.'</option>';
          }
        break;
        case 'materias':

          $rspta = $registro->apermateria($de);
          echo  '<option value=""></option>';
          while ($reg = $rspta->fetch_object()) {
            echo '<option value='.$reg->id_aper.'>'.$reg->descripcion.'</option>';
          }
          // unset($_SESSION['cart']);
        break;

    case 'listar':



            $rspta = $registro->listar($de);
              //var_dump($rspta); exit;
            //Vamos a declarar un array
            $data = array();
            while ($reg = $rspta->fetch_object()) {
                $data[]=array(
                    "0"=>($reg->activo) ?''.
                    ' <buton class="btn btn-danger" onclick="desactivar('.$reg->id_reg.')"><i class="fa fa-close"></i></buton>':
                    '<buton class="btn btn-warning" onclick="mostrar('.$reg->id_reg.')"><i class="fa fa-pencil"></i></buton>'.
                    ' <buton class="btn btn-primary" onclick="activar('.$reg->id_reg.')"><i class="fa fa-check"></i></buton>',
                    "1"=>' <a data-toggle="modal" href="#myModal">
                    <buton class="btn btn-primary" onclick="notas('.$reg->id_reg.')"><i class="fa fa-eye" ></i></buton>
                  </a>',
                    "2"=>$reg->nombre . ' '.$reg->apellido,
                    "3"=>$reg->semestre,
                    "4"=>$reg->fecha,
                    "5"=>($reg->activo)?'<span class="label bg-success">Activada</span>':
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


    case 'listarNotas':
          require_once "../modelos/Notas.php";
          $notas=new Notas();

          $rspta=$notas->listarActivos($de,$ide); // $de = ciudad, $ide = numero de registro
           //Vamos a declarar un array
           $data= Array();

           while ($reg=$rspta->fetch_object()){
             $data[]=array(
               "0"=>($reg->activo) ?' <buton class="btn btn-danger" onclick="desactivarmat('.$reg->id_his.')"><i class="fa fa-close"></i></buton>':

               ' <buton class="btn btn-primary" onclick="activarmat('.$reg->id_his.')"><i class="fa fa-check"></i></buton>',
               "1"=>$reg->materia,
               "2"=>$reg->docenteno.' '.$reg->docenteap,
               "3"=>($reg->activo)?'<span class="label bg-success">Activada</span>':
               '<span class="label bg-red">Desactivada</span>'

               );
           }
           $results = array(
             "sEcho"=>1, //Información para el datatables
             "iTotalRecords"=>count($data), //enviamos el total registros al datatable
             "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
             "aaData"=>$data);
           echo json_encode($results);
        break;
  case 'desactivarmat':

          $rspta = $registro->desactivarmat($id_his);
          echo $rspta ? "Registro Desactivado":"Materia no se puede desactivar";
      break;
  case 'activarmat':
      $rspta = $registro->activarmat($id_his);
      echo $rspta ? "Registro Activada":"Materia no se puede activar";
      break;

}


?>

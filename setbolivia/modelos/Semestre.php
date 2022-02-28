<?php

require_once"../config/conexion.php";



class Semestre
{
    public function __construct()
    {

    }
    //Implementamos un metodo para insertr registros
    public function insertar($semestre, $fechainicio, $fechafinal, $id_depto, $id_usu, $activo)
    {
         $sql = "INSERT INTO apersemestre (semestre, fechainicio, fechafinal, id_depto, id_usu, activo)
        VALUES ('$semestre', '$fechainicio', '$fechafinal', '$id_depto', '$id_usu', '$activo')";

      return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para editar registros
    public function editar($id, $semestre, $fechainicio, $fechafinal, $id_depto, $id_usu, $activo)
    {
        $sql = "UPDATE apersemestre SET
        semestre ='$semestre', fechainicio='$fechainicio', fechafinal='$fechafinal',
        id_depto = '$id_depto', id_usu='$id_usu', activo='$activo'
        WHERE id = '$id'";

        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para eliminar categorias
    public function desactivar($id)
    {
        $sql = "UPDATE apersemestre SET activo = '0' WHERE id = '$id'";
        return ejecutarConsulta($sql);
    }
    public function activar($id)
    {
        $sql = "UPDATE apersemestre SET activo = '1' WHERE id = '$id'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id)
    {
       $sql = "SELECT * FROM apersemestre WHERE id = '$id'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($id)
    {

        $sql = "SELECT * FROM apersemestre  where id_depto = $id and activo=1";
        return ejecutarConsulta($sql);
    }
    public function listartodo($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        return ejecutarConsulta($sql);
    }



    public function get_usuario($id)
    {
        $sql = "SELECT * FROM usuario where id_usu = '$id' ";
        return ejecutarConsulta($sql);
    }

    public function usuci($tabla,$id)
    {
        $sql = "SELECT * FROM $tabla where usu_id = '$id' ";
        return ejecutarConsulta($sql);
    }


}

?>

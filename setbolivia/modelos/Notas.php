<?php

require_once"../config/conexion.php";



class Notas
{
    public function __construct()
    {

    }
    //Implementamos un metodo para insertr registros
    public function insertar($id_alm, $id_mat, $nota, $fecha, $id_reg, $docente, $activo)
    {
         $sql = "INSERT INTO notas_historial (id_alm, id_mat, nota, fecha, id_reg, docente, activo)
        VALUES ('$id_alm', '$id_mat', '$nota', '$fecha', '0', '$docente', '$activo')";

      return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para editar registros
    public function editar($id_his,$id_alm, $id_mat, $nota, $fecha, $id_reg, $docente, $activo)
    {
        $sql = "UPDATE notas_historial SET
        id_alm ='$id_alm', id_mat='$id_mat', nota='$nota',
        fecha = '$fecha', id_reg='0', docente ='$docente', activo='$activo'
        WHERE id_his = '$id_his'";

        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para eliminar categorias
    public function desactivar($id_his)
    {
        $sql = "UPDATE notas_historial SET activo = '0' WHERE id_his = '$id_his'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_his)
    {
        $sql = "UPDATE notas_historial SET activo = '1' WHERE id_his = '$id_his'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id_his)
    {
       $sql = "SELECT * FROM notas_historial WHERE id_his = '$id_his'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($id)
    {

       $sql = "SELECT notas_historial.id_his as id_his, notas_historial.fecha, notas_historial.nota, alumnos.nombre as alumnono,
        alumnos.apellido as alumnoap, docentes.nombre as docenteno, docentes.apellido as docenteap,
        materias.descripcion as materia, notas_historial.activo FROM notas_historial
        INNER JOIN alumnos ON alumnos.id_alm=notas_historial.id_alm
        INNER JOIN docentes ON docentes.id_doc = notas_historial.docente
        INNER JOIN materias ON materias.id_mat= notas_historial.id_mat where alumnos.ciudad = $id";
        return ejecutarConsulta($sql);
    }
    public function listarActivos($id,$ide)
    {

       $sql = "SELECT notas_historial.id_his as id_his, notas_historial.fecha, notas_historial.nota, alumnos.nombre as alumnono,
        alumnos.apellido as alumnoap, docentes.nombre as docenteno, docentes.apellido as docenteap,
        materias.descripcion as materia, notas_historial.activo FROM notas_historial
        INNER JOIN alumnos ON alumnos.id_alm=notas_historial.id_alm
        INNER JOIN docentes ON docentes.id_doc = notas_historial.docente
        INNER JOIN materias ON materias.id_mat= notas_historial.id_mat where alumnos.ciudad = $id  AND notas_historial.id_reg = $ide";
        return ejecutarConsulta($sql);
    }
    public function listartodo($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        return ejecutarConsulta($sql);
    }

    public function verifica($id_alm, $id_mat)
    {
        $sql = "SELECT * FROM notas_historial where id_alm = $id_alm and id_mat = $id_mat ";
        return ejecutarConsulta($sql);
    }

    public function get_usuario($id)
    {
        $sql = "SELECT * FROM usuario where id_usu = '$id' ";
        return ejecutarConsulta($sql);
    }
    public function alumnociudad($id)
    {
        $sql = "SELECT * FROM alumnos WHERE ciudad=$id";
        return ejecutarConsulta($sql);
    }
    public function docenteciudad($id)
    {
        $sql = "SELECT * FROM docentes WHERE departamento=$id";
        return ejecutarConsulta($sql);
    }
    public function usuci($tabla,$id)
    {
        $sql = "SELECT * FROM $tabla where usu_id = '$id' ";
        return ejecutarConsulta($sql);
    }


}

?>

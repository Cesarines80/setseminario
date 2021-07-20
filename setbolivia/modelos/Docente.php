<?php

require_once"../config/conexion.php";

class Docente
{
    public function __construct()
    {

    }
    //Implementamos un metodo para insertr registros
    public function insertar($nombre, $apellido, $telefono, $celular, $imagen, $fech_nac, $sexo, $ci, $email, $especialidad, $departamento, $provincia, $distrito, $activo)
    {
        $sql = "INSERT INTO docentes (nombre, apellido, telefono, celular, imagen, fech_nac, sexo, ci, email, especialidad, departamento, provincia, distrito, activo)
        VALUES ('$nombre', '$apellido', '$telefono', '$celular', '$imagen', '$fech_nac', '$sexo', '$ci', '$email', '$especialidad', '$departamento', '$provincia', '$distrito', '$activo')";

      return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para editar registros
    public function editar($id_doc, $nombre, $apellido, $telefono, $celular, $imagen, $fech_nac, $sexo, $ci, $email, $especialidad, $departamento, $provincia, $distrito, $activo)
    {
      $sql = "UPDATE docentes SET
        nombre ='$nombre', apellido='$apellido', telefono='$telefono',
        celular = '$celular', imagen='$imagen', fech_nac ='$fech_nac', sexo='$sexo', ci='$ci', email='$email', especialidad='$especialidad',
        departamento='$departamento', provincia='$provincia',
        distrito='$distrito', activo='$activo'
        WHERE id_doc = '$id_doc'";

        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para eliminar categorias
    public function desactivar($id_doc)
    {
        $sql = "UPDATE docentes SET activo = '0' WHERE id_doc = '$id_doc'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_doc)
    {
        $sql = "UPDATE docentes SET activo = '1' WHERE id_doc = '$id_doc'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id_doc)
    {
       $sql = "SELECT * FROM docentes WHERE id_doc = '$id_doc'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($id)
    {
        $sql = "SELECT * FROM docentes WHERE departamento = $id";
        return ejecutarConsulta($sql);
    }
    public function listartodo($tabla)
    {
        $sql = "SELECT * FROM $tabla";
        return ejecutarConsulta($sql);
    }

    public function listarid($tabla,$id)
    {
        $sql = "SELECT * FROM $tabla where relacion = '$id' ";
        return ejecutarConsulta($sql);
    }
    public function usuci($tabla,$id)
    {
        $sql = "SELECT * FROM $tabla where usu_id = '$id' ";
        return ejecutarConsulta($sql);
    }
    public function select()
    {
        $sql = "SELECT * FROM alumnos WHERE condicion=1";
        return ejecutarConsulta($sql);
    }


}

?>

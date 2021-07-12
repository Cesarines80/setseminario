<?php

require_once"../config/conexion.php";

class Alumno
{
    public function __construct()
    {

    }
    //Implementamos un metodo para insertr registros
    public function insertar($nombre, $apellido, $telefono, $celular, $imagen, $estado_civil, $email, $direccion, $fech_nac, $napais, $naciudad, $naprovincia, $c_i,  $ciudad, $provincia, $distrito, $miembro, $fecha, $estado, $act_sem)
    {
        $sql = "INSERT INTO alumnos (nombre, apellido, telefono, celular, imagen, estado_civil, email, direccion, fech_nac, napais, naciudad, naprovincia, c_i, ciudad, provincia, distrito, miembro, fecha, estado, act_sem)
        VALUES ('$nombre', '$apellido', '$telefono', '$celular', '$imagen', '$estado_civil', '$email', '$direccion', '$fech_nac', '$napais', '$naciudad', '$naprovincia', '$c_i',  '$ciudad', '$provincia', '$distrito', '$miembro', '$fecha', '$estado', '$act_sem')";

      return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para editar registros
    public function editar($id_alm, $nombre, $apellido, $telefono, $celular, $imagen, $estado_civil, $email, $direccion, $fech_nac, $napais, $naciudad, $naprovincia, $c_i,  $ciudad, $provincia, $distrito, $miembro, $fecha, $estado, $act_sem)
    {
        $sql = "UPDATE alumnos SET
        nombre ='$nombre', apellido='$apellido', telefono='$telefono',
        celular = '$celular', imagen='$imagen', estado_civil='$estado_civil',
        email='$email', direccion='$direccion', fech_nac='$fech_nac',
        napais='$napais', naciudad='$naciudad', naprovincia='$naprovincia',
        c_i='$c_i', ciudad='$ciudad', provincia='$provincia',
        distrito='$distrito', miembro='$miembro', fecha='$fecha',
        estado='$estado', act_sem='$act_sem'
        WHERE id_alm = '$id_alm'";

        return ejecutarConsulta($sql);
    }
    //Implementamos un metodo para eliminar categorias
    public function desactivar($id_alm)
    {
        $sql = "UPDATE alumnos SET estado = '0' WHERE id_alm = '$id_alm'";
        return ejecutarConsulta($sql);
    }
    public function activar($id_alm)
    {
        $sql = "UPDATE alumnos SET estado = '1' WHERE id_alm = '$id_alm'";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id_alm)
    {
        $sql = "SELECT * FROM alumnos WHERE id_alm = '$id_alm'";
        return ejecutarConsultaSimpleFila($sql);
    }

    public function listar($d)
    {
        $sql = "SELECT * FROM alumnos where ciudad = $d";

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

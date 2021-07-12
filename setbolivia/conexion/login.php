<?php
session_start();
require('conexion.php');
//var_dump($_POST);
if($_POST){
$usuario = $_POST['usuario'];
$password = $_POST['password'];
//echo $usuario.$password;
$con = new conexion();
$mysqli = $con->conexion();
$querys = "SELECT * FROM usuario WHERE usu_login = '$usuario' and usu_pass ='$password' and usu_sw= '2' and activo = '1'";
$resultado = $mysqli->query($querys);
$num = $resultado->num_rows;

if($num>0){
      $row = $resultado->fetch_assoc();
      $password_bd =$row['usu_pass'];
      if($password==$password_bd){

              $_SESSION['nombre']=$row['nombre'];
              $_SESSION['id']=$row['usu_id'];
              $_SESSION['apellido']=$row['apellido'];
              $_SESSION['sw']=$row['usu_sw'];
              $_SESSION['ciudad']=$row['ciudad'];

              header("Location: ../superadmin/index.php");

      }else{
          echo "la contrase;a no coinside";
      }

}else{
            $querys = "SELECT * FROM usuario WHERE usu_login = '$usuario' and usu_pass ='$password' and usu_sw= '1' and activo = '1'";
          $resultado = $mysqli->query($querys);
          $num = $resultado->num_rows;

          if($num>0){
            $row = $resultado->fetch_assoc();
            $password_bd =$row['usu_pass'];
            if($password==$password_bd){

                    $_SESSION['nombre']=$row['nombre'];
                    $_SESSION['id']=$row['usu_id'];
                    $_SESSION['apellido']=$row['apellido'];
                    $_SESSION['sw']=$row['usu_sw'];
                    $_SESSION['ciudad']=$row['ciudad'];

                    header("Location: ../administracion/index.php");

            }else{
                echo "la contrasena no coinsidesss";
            }


          }else
          {
            $querys = "SELECT * FROM docentes WHERE nombre = '$usuario' and ci ='$password'  and activo = '1'";
            $resultado = $mysqli->query($querys);
            $num = $resultado->num_rows;

            if($num>0){
              $row = $resultado->fetch_assoc();
              $password_bd =$row['ci'];
              if($password==$password_bd){

                      $_SESSION['nombre']=$row['nombre'];
                      $_SESSION['id_doc']=$row['id_doc'];
                      $_SESSION['apellido']=$row['apellido'];

                      $_SESSION['ciudad']=$row['departamento'];

                      header("Location: ../docentes/index.php");

              }else{
                  echo "la contrase;a no coinside1";
              }


            }else {

               $querys = "SELECT * FROM alumnos WHERE nombre = '$usuario' and c_i ='$password'  and estado = '1'";
              $resultado = $mysqli->query($querys);
              $num = $resultado->num_rows;

              if($num>0){
                $row = $resultado->fetch_assoc();
                $password_bd =$row['c_i'];
                if($password==$password_bd){

                        $_SESSION['nombre']=$row['nombre'];
                        $_SESSION['id_alm']=$row['id_alm'];
                        $_SESSION['apellido']=$row['apellido'];

                        $_SESSION['ciudad']=$row['ciudad'];

                        header("Location: ../alumnos/index.php");

                }else{
                    echo "la contrase;a no coinside1";
                }


              }



            }//fin else


          }
}//esle fin

}
?>


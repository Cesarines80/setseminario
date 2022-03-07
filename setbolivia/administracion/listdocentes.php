<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../index.php");
}

require_once('class.php');
require_once('../config/conexion.php');
require_once('../modelos/Alumno.php');
$obj = new Consultas();
$usuario = $obj->get_usuario($_SESSION['id']);
//$materias = $obj-> get_num_mat($_SESSION['id']);

//var_dump($_SESSION); exit;
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'header.php';
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

            <!-- Navbar -->
            <?php
        include 'navbar.php';
      ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->

            <?php
            include 'aside.php';
            ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">TRIMESTRES 1</h1>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
              <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Lista de Docentes</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Materia</th>
                            <th>Grado</th>
                            <th>Semestre</th>


                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Materia</th>
                            <th>Grado</th>
                            <th>Semestre</th>
                          </tfoot>
                        </table>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <?php
            include'footer.php';
            ?>
            <script type="text/javascript" src="scripts/listdocentes.js"></script>

    </div>

</body>

</html>

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
                                <h1 class="m-0">MATERIAS</h1>
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
                          <h1 class="box-title">Materias Aperturados <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Materia</th>
                            <th>Grado</th>
                            <th>Trimestre</th>
                            <th>Docente</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                            <th>Fecha</th>
                            <th>Materia</th>
                            <th>Grado</th>
                            <th>Trimestre</th>
                            <th>Docente</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-row">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Grado(*):</label>
                                <select data-placeholder="Seleccion Grado..." class="chosen-select"  name="grado" id="grado" required>
                                    <option>Elija Grado</option>

                                </select>
                                <input type="hidden" name="id_aper" id="id_aper">
                              </div>
                              <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Materia(*):</label>
                                <select data-placeholder="Seleccion Materia..." class="form-control"  name="id_materia" id="id_materia" required>
                                    <option>Elija Materia</option>

                                </select>
                                </div>


                        </div>
                        <div class="form-row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Docente(*):</label>
                                <select data-placeholder="Seleccion Docente..." class="form-control"  name="id_doce" id="id_doce" required>
                                    <option>Elija el Docente</option>

                                </select>
                                </div>
                                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                      <label>Fecha de Inicio(*):</label>
                                      <input type="date" class="form-control" name="fecha" id="fecha" maxlength="50" placeholder="Fecha" required>
                                    </div>
                        </div>
                        <div class="form-row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Trimestre(*):</label>
                                <select data-placeholder="Seleccion Trimestre..." class="form-control"  name="semestre" id="semestre" required>
                                    <option>Elija el Trimestre</option>

                                </select>
                                </div>

                        </div>


                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
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
            <script type="text/javascript" src="scripts/materia.js"></script>

    </div>

</body>

</html>

<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../index.php");
}
$ide_aper = 1;
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
                                <h1 class="m-0">REGISTRO</h1>
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
                          <h1 class="box-title">Registro de alumnos del Trimestre <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Materias</th>
                            <th>Nombre</th>
                            <th>Semestre</th>
                            <th>Fecha</th>

                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <th>Opciones</th>
                          <th>Materias</th>
                            <th>Nombre</th>
                            <th>Semestre</th>
                            <th>Fecha</th>

                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Alumno(*):</label>
                            <select class="chosen-select" data-placeholder="Seleccione al Estudiante..."  name="id_alm" id="id_alm" required>
                            <option value=""></option>
                            </select>
                            <input type="hidden" name="id_his" id="id_his">
                          </div>

                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Materia(*):</label>
                            <select class="form-control"  name="id_aper[]" id="id_mat" data-placeholder="Seleccione las materias..."   class="chosen-select " multiple tabindex="3" required>

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
            <!-- Modal Materia -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <a data-toggle="modal" href="#myModales">
                              <button id="btnAgregarArt" type="button" class="btn btn-primary" onclick="registro()"> <span class="fa fa-plus"></span> Agregar Materia</button>
                            </a>
                </div>
        </div>
        <div class="modal-body">
          <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <th>Opciones</th>
                <th>Materia</th>
                <th>Docente</th>
                <th>Estado</th>

            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <th>Opciones</th>
                <th>Materia</th>
                <th>Docente</th>
                <th>Estado</th>
            </tfoot>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin modal -->
   <!-- Modal Materia -->
   <div class="modal fade" id="myModales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>


        </div>
        <div class="modal-body">
        <form name="formulario" id="formulario" method="POST">
                        <div class="form-row">

                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Materia(*):</label>
                            <select class="form-control"  name="id_aper[]" id="id_aper" data-placeholder="Seleccione las materias..."   class="chosen-select "  required>

                            </select>

                          </div>
                        </div>



                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar1"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                  </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fin modal -->
            <!-- Main Footer -->
            <?php
            include'footer.php';
            ?>
            <script type="text/javascript" src="scripts/registro.js"></script>

    </div>

</body>

</html>

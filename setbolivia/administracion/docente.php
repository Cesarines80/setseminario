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
                                <h1 class="m-0">DOCENTE</h1>
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
                          <h1 class="box-title">Nuevo Docente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>

                            <th>Nombre</th>
                            <th>correo</th>
                            <th>telefono</th>
                            <th>celular</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>

                            <th>Nombre</th>
                            <th>correo</th>
                            <th>telefono</th>
                            <th>celular</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body"  id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-row">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre (*):</label>
                            <input type="hidden" name="id_doc" id="id_doc">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Apellido(*):</label>
                            <input type="text" class="form-control" name="apellido" id="apellido" maxlength="50" placeholder="Apellido" required>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono" maxlength="50" placeholder="Telefono" >
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Celular(*):</label>
                            <input type="text" class="form-control" name="celular" id="celular" maxlength="50" placeholder="Celular" required>
                          </div>
                        </div>
                      <div class="form-row">
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Imagen:</label>
                            <input type="file" class="form-control" name="imagen" id="imagen">
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <img src="" width="150px" height="120px" id="imagenmuestra">
                        </div>

                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Fecha Nacimiento(*):</label>
                            <input type="date" class="form-control" name="fech_nac" id="fech_nac" maxlength="50" placeholder="Email" required>
                            </div>
                      </div>

                      <div class="form-row">


                      <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Sexo(*):</label>
                            <select class="form-control"  name="sexo" id="sexo" required>
                              <option value="0">Seleccione...</option>
                              <option value="Femenino">Femenino</option>
                              <option value="Masculino">Masculino</option>
                            </select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>C.I.(*):</label>
                            <input type="text" class="form-control" name="ci" id="ci" maxlength="50" placeholder="536372" required>

                          </div>
                      </div>
                      <div class="form-row">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Correo:</label>
                            <input type="email" class="form-control" name="email" id="email" maxlength="50" placeholder="Email" >
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Categoria(*):</label>
                            <select class="chosen-select" data-placeholder="Seleccione Materia..."   name="especialidad" id="especialidad" required>

                            </select>
                          </div>
                      </div>

                      <H4 class="text-info">Lugar del seminario</H4>
                            <HR></HR>
                      <div class="form-row">

                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Ciudad(*):</label>
                            <select class="chosen-select" data-placeholder="Seleccione Ciudad..."   name="departamento" id="departamento" required>

                            </select>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Provincia(*):</label>
                            <select class="form-control" name="provincia" id="provincia" required >

                            </select>
                          </div>
                          <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <label>Distrito(*):</label>
                            <select class="form-control"  name="distrito" id="distrito" required>

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
            <script type="text/javascript" src="scripts/docente.js"></script>

    </div>

</body>

</html>

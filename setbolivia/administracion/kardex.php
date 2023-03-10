<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location: ../index.php");
}
require_once('../conexion/conexion.php');
require_once('class.php');
$id_alm = $_GET['id_alm'];
$obj = new Consultas();
$alumno = $obj->get_alum($id_alm);

 $materia = $obj->get_materia(0, 20);
 $tecnico = $obj->get_materia(25, 14);
 $fundamental = $obj->get_materia(20, 5);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alumnos | Panel </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

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
                                <h1 class="m-0">ESTUDIANTE</h1>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">



          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kardex del Estudiante: <?php echo $alumno[0]['nombre']; ?> <?php echo $alumno[0]['apellido']; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <strong ><i class="fas fa-book mr-1"></i> DIPLOMA MINISTERIAL</strong>
              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Nro</th>
                                      <th scope="col">MATERIA</th>
                                      <th scope="col">CREDITOS</th>
                                      <th scope="col">NOTAS</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                    <?php

                                    $j=1;
                                    for($i=0;$i<sizeof($materia);$i++)
                                    {
                                    ?>
                                     <tr>
                                      <th scope="row"><?php echo $j; ?></th>
                                      <td><?php echo $materia[$i]['descripcion']; ?></td>
                                      <td><?php echo $materia[$i]['creditos']; ?></td>
                                      <td>
                                      <?php
                                       $notas = $obj->get_notas($id_alm, $materia[$i]['id_mat']);
                                            echo $notas[0]['nota'];
                                            //var_dump($notas);
                                         ?>
                                      </td>
                                    </tr>
                                   <?php
                                    $j++;
                                  }

                                  ?>

                                  </tbody>
                                </table>


                             </div>
              <!-- /.card-body -->
            </div>
            <div class="card-body">
              <strong ><i class="fas fa-book mr-1"></i>TECNICO SUPERIOR EN TEOLOGIA</strong>
              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Nro</th>
                                      <th scope="col">MATERIA</th>
                                      <th scope="col">CREDITOS</th>
                                      <th scope="col">NOTAS</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                    <?php

                                    $j=1;
                                    for($i=0;$i<sizeof($tecnico);$i++)
                                    {
                                    ?>
                                     <tr>
                                      <th scope="row"><?php echo $j; ?></th>
                                      <td><?php echo $tecnico[$i]['descripcion']; ?></td>
                                      <td><?php echo $tecnico[$i]['creditos']; ?></td>
                                      <td>
                                      <?php
                                       $notas = $obj->get_notas($id_alm, $tecnico[$i]['id_mat']);
                                            echo $notas[0]['nota'];
                                            //var_dump($notas);
                                         ?>
                                      </td>
                                    </tr>
                                   <?php
                                    $j++;
                                  }

                                  ?>

                                  </tbody>
                                </table>


                             </div>
              <!-- /.card-body -->
            </div>
            <div class="card-body">
              <strong ><i class="fas fa-book mr-1"></i>CURSO FUNDAMENTAL</strong>
              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Nro</th>
                                      <th scope="col">MATERIA</th>
                                      <th scope="col">CREDITOS</th>
                                      <th scope="col">NOTAS</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                    <?php

                                    $j=1;
                                    for($i=0;$i<sizeof($fundamental);$i++)
                                    {
                                    ?>
                                     <tr>
                                      <th scope="row"><?php echo $j; ?></th>
                                      <td><?php echo $fundamental[$i]['descripcion']; ?></td>
                                      <td><?php echo $fundamental[$i]['creditos']; ?></td>
                                      <td>
                                      <?php
                                       $notas = $obj->get_notas($id_alm, $fundamental[$i]['id_mat']);
                                            echo $notas[0]['nota'];
                                            //var_dump($notas);
                                         ?>
                                      </td>
                                    </tr>
                                   <?php
                                    $j++;
                                  }

                                  ?>

                                  </tbody>
                                </table>
                                <a href="../pdf/kardex1.php?id_alm=<?php echo $id_alm;?>" class="btn btn-success">Imprimir</a>
                                <input type="button"  name="boton3" class="btn btn-warning" id="boton3" value="Volver" onClick="history.back();" />


                             </div>
              <!-- /.card-body -->
            </div>



                    </div>
                    <!-- /.post -->

                    <!-- Post -->



                    </div>
                    <!-- /.post -->



                      <!-- /.row -->




                    </div>
                    <!-- /.post -->
                  </div>



                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


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

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="../plugins/raphael/raphael.min.js"></script>
    <script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="../plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard2.js"></script>
</body>

</html>

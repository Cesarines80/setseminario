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
                <h3 class="card-title">Materias Registradas: <?php echo $alumno[0]['nombre']; ?> <?php echo $alumno[0]['apellido']; ?></h3>
              </div>

              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Nro</th>
                                      <th scope="col">MATERIA</th>
                                      <th scope="col">DOCENTE</th>
                                      <th scope="col">BIBLIOGRAFIA</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                    <?php

                                    $j=1;
                                    for($i=0;$i<sizeof($semestre);$i++)
                                    {
                                    ?>
                                     <tr>
                                      <th scope="row"><?php echo $j; ?></th>
                                      <td>
                                      <?php
                                      //echo $semestre[$i]['id_mat'];
                                      $materias = $obj->get_materia_total($semestre[$i]['id_mat']);
                                      echo $materias[0]['descripcion'];
                                      ?></td>
                                      <td><?php
                                      $docente = $obj->get_docentes($semestre[$i]['id_doc']);
                                      echo $docente[0]['nombre'];   echo"&nbsp;". $docente[0]['apellido'];
                                      //echo $docente[$i]['id_doc'];
                                      ?></td>
                                      <td>
                                      <?php
                                       //$notas = $obj->get_notas($_SESSION['id_alm'], $tecnico[$i]['id_mat']);
                                       //     echo $notas[0]['nota'];
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


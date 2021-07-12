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
                <h3 class="card-title">Materias del Semestre </h3>
              </div>

              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Nro</th>
                                      <th scope="col">MATERIA</th>
                                      <th scope="col">CARRERA</th>
                                      <th scope="col">CREDITOS</th>
                                      <th scope="col">ALUMNOS</th>
                                      <th scope="col">Cerrar Materia</th>
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
                                      $mat = $semestre[$i]['id_materia'];
                                      $materias = $obj->get_materia_total($mat);
                                      echo $materias[0]['descripcion'];
                                      ?></td>
                                      <td><?php
                                        $grado = $materias[0]['id_grado'];
                                      $grado = $obj->get_grado($grado);
                                      echo $grado[0]['nivel'];
                                      //echo $docente[$i]['id_doc'];
                                      ?></td>
                                      <td>
                                      <?php

                                          echo $materias[0]['creditos'];
                                            //var_dump($notas);
                                         ?>
                                      </td>
                                      <td><a href="notasalm.php?id_mat=<?php echo $semestre[$i]['id_materia']; ?>"><i class="fas fa-users"> Alumnos</i></a>
                                      </td>
                                      <td> <a href="javascript:;" onclick="aviso('cerrarmateria.php?desactivar=<?php echo $semestre[$i]['id_aper'];?>'); return false;"><i class="far fa-copy">Cerrar</i></a>  </td>

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


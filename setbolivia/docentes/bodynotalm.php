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
                <h3 class="card-title">Alumnos del Semestre </h3>
              </div>

              <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th scope="col">Nro</th>
                                      <th scope="col">ALUMNO</th>
                                      <th scope="col">MATERIA</th>
                                      <th scope="col">CARRERA</th>
                                      <th scope="col">CREDITOS</th>
                                      <th scope="col">NOTAS</th>
                                    </tr>
                                  </thead>
                                  <tbody>


                                    <?php

                                    $j=1;
                                    for($i=0;$i<sizeof($registro);$i++)
                                    {
                                    ?>
                                     <tr>
                                      <th scope="row"><?php echo $j; ?></th>
                                      <td>
                                      <?php
                                      $mat = $registro[$i]['id_alm'];
                                     $alumno = $obj->get_alum($mat);
                                      echo $alumno[$i]['nombre'];  echo"&nbsp;".$alumno[$i]['apellido'];
                                      ?></td>
                                      <td><?php
                                        $mater  = $registro[$i]['id_mat'];
                                      $grado = $obj->get_materia_total($mater);
                                      echo $grado[0]['descripcion'];
                                      //echo $docente[$i]['id_doc'];
                                      ?></td>
                                      <td>
                                      <?php

                                        $carre = $obj->get_grado($grado[0]['id_grado']);
                                        echo $carre[0]['nivel'];
                                            //var_dump($notas);
                                         ?>
                                      </td>
                                      <td><?php
                                        echo $grado[0]['creditos'];

                                      ?>
                                      </td>
                                      <?php
                                      $datos4 = $obj->get_historial($mat,$mater);

                                      if ($datos4[0]['nota']==0) {
                                          ?>
                                          <td><a href="ingrenotas.php?id_mate=<?php echo $mater ?>&id_alm=<?php echo $mat; ?>"><img src="../images/images.jpg" width="25" height="25" alt="Editar" border="0"/></a></td>
                                          <?php
                                        }else{

                                          ?>
                                          <td><?php echo  $datos4[0]['nota']; ?></td>
                                          <?php
                                        }
                                        ?>

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


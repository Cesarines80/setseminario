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
                                       $notas = $obj->get_notas($_SESSION['id_alm'], $materia[$i]['id_mat']);
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
                                       $notas = $obj->get_notas($_SESSION['id_alm'], $tecnico[$i]['id_mat']);
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
                                       $notas = $obj->get_notas($_SESSION['id_alm'], $fundamental[$i]['id_mat']);
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
                                <a href="../pdf/kardex.php?id_alm=<?php echo $_GET["alumno"];?>" class="btn btn-success">Imprimir</a>
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


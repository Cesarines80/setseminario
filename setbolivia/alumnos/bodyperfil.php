
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/user4-128x128.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $alumno[0]['nombre']; ?> <?php echo $alumno[0]['apellido']; ?></h3>

                <p class="text-muted text-center"><?php echo $alumno[0]['ciudad']; ?></p>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Acerca de Mi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Datos Personales</strong>
              <div class="card" style="width: 18rem;">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">  <?php echo $alumno[0]['nombre']; ?></li>
                    <li class="list-group-item"> <?php echo $alumno[0]['apellido']; ?></li>
                    <li class="list-group-item"><?php echo $alumno[0]['celular']; ?> </li>
                  </ul>
                </div>


                <hr>
                <strong><i class="fas fa-book mr-1"></i> Educacion</strong>

                <p class="text-muted">
                  Estudiante de Teologia
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>

                <p class="text-muted"><?php echo $alumno[0]['direccion']; ?></p>


                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Distrito</strong>

                <p class="text-muted"><?php echo $alumno[0]['distrito']; ?></p>


                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Ciudad</strong>

                <p class="text-muted"><?php echo $alumno[0]['ciudad']; ?></p>


                <hr>


                <strong><i class="far fa-file-alt mr-1"></i> Notas</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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


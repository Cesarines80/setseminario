<section class="content">
                    <div class="container-fluid">
                        <!-- Info boxes -->
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Materias Aprobadas</span>
                                                <span class="info-box-number">
                                                <?php
                                                  $por = $promedio;
                                                 // echo $por[0];
                                                  $total = (100 * $por[0])/34;
                                                  echo number_format($total);

                                                  ?>
                                                  <small>%</small>
                                                </span>
                                            </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Promedio</span>
                                        <span class="info-box-number">
                                        <?php


                                          $por = array_sum(array_column($promo, 'nota'));

                                          if($por == 0){
                                              echo "0%";
                                          }else{



                                          $er = count($promo);
                                          $promedios = $por / $er ;
                                          echo  round($promedios,2);
                                        }

                                        ?>

                                        </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>

                            <div class="clearfix hidden-md-up"></div>

                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Reconocimientos</span>
                                        <span class="info-box-number">0</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-12 col-sm-6 col-md-3">
                                <div class="info-box mb-3">
                                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Diplomas</span>
                                        <span class="info-box-number">2,000</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>


                    </div>
                    <!--/. container-fluid -->
                </section>

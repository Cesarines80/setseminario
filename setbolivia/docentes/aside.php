<aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="../../img/log2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">DOCENTE - PANEL</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../files/docentes/<?php echo $docente[0]['imagen']; ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"><?php echo $docente[0]['nombre']; ?> <?php echo $docente[0]['apellido']; ?></a>
                        </div>
                    </div>




                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="index.php" class="nav-link active">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>DOCENTE</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>



                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tree"></i>
                                    <p>
                                        Info Academica
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="semestre.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Materias</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="semestre.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Semestre</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>


                            <li class="nav-header">IFORMACION</li>


                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Datos Docente
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="perfil.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Perfil</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="contac.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Contactos</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

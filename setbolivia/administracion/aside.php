<aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index.php" class="brand-link">
                    <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">ADMIN - PANEL</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="index.php" class="d-block"><?php echo $usuario[0]['nombre']; ?> <?php echo $usuario[0]['apellido']; ?></a>
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
                                            <p>ADMINISTRACION</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>



                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tree"></i>
                                    <p>
                                        Altas y Bajas
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="docente.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Docentes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="alumno.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Alumnos</p>
                                        </a>
                                    </li>


                                </ul>
                            </li>


                            <li class="nav-header">GESTION ACADEMICA</li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        ACADEMICO
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                <li class="nav-item">
                                        <a href="semestre.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Semestre</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="materia.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Materias</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="listdocentes.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Docentes</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="lista.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Alumnos</p>
                                        </a>
                                    </li>



                                </ul>
                            </li>

                            <li class="nav-header">REGISTRO</li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Alumnos Semestre
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="registro.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Alumnos Semestre</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="notas.php" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Notas</p>
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

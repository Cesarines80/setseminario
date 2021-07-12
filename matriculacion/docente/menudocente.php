<nav class="navbar navbar-fixed-top navbar-inverse ">
    <h3 align="center" class="fon" >SISTEMA DE INFORMACION SEMINARIO</h3>
  </nav>

    <nav class="navbar navbar-inverse  nav-shadow">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand " href="../admindocente.php">PAGINA PRINCIPAL</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
            
             <li class="active" ><a href="materias.php?id=<?php echo $_SESSION['id'];  ?>">MATERIAS</a></li>
             
             
                <li class="active" ><a href="../cerrar_sesion.php">CERRAR SESION</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php require_once 'class/class.php'; 
$blog = new Consultas();
if (isset($_POST['grabar']) and $_POST['grabar']=='si')
{
  $blog->nueva_docente();
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "headers.php" ?>

    
  </head>

  <body>
 
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
          <a class="navbar-brand " href="index.php">PAGINA PRINCIPAL</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active" ><a href="logindocente.php">MODULO DOCENTE</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container "> 

       <form class="form-signin" name="form" action="" method="post">
        <h4 class="form-signin-heading">INGRESE USUARIO Y PASSWORD</h4>
        <div class="form-group"> 
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="inputEmail" name="nom" class="form-control" placeholder="Usuario" required autofocus>
        <input type="hidden" name="grabar" value="si">
        </div>
        <div class="form-group">  
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
        <?php
        if(isset($_GET['usuario']))
        {
        ?>
       
        <?php
          switch($_GET['usuario'])
          {
            case 'no_existe':
            ?>
              <p style="background:#f00; color:#fff; text-align:center">Los datos introducidos no existen</p>
            <?php
          }
        }
        ?>
        </div>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit" onClick="validar()">Sign in</button>
      </form>

    </div> <!-- /container -->


    
    <?php include "footer.php" ?>
  </body>
</html>
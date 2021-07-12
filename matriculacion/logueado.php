<?php
include "session.php";
?>
<h2>Bienvenido de nuevo <?php echo $_SESSION['nick'];?></h2>
<a href="cerrar_sesion.php">Cerrar sesión</a>

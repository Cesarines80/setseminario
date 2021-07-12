<?php
   include('class/class.php');
   
   
   if(!isset($_SESSION['nick'])){
      header("location:index.php");
   }
?>
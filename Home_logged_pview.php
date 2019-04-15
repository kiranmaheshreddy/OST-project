<?php
include("connection.php");
 session_start();
 $_SESSION['pcategory']=$_GET['pcategory'];
 $_SESSION['ptype']=$_GET['ptype'];
  header("Location:product_list_logged.php");
?>
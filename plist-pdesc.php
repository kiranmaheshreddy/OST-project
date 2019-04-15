<?php
include("connection.php");
 session_start();
 $pid=$_GET['pid'];
 $_SESSION['pid']=$pid;
 header("Location:product_desc.php");
?>
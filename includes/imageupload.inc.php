<?php
session_start();

if (isset($_SESSION['name'])) {

  echo "<br>welcome...";
  $user = $_SESSION['name'];
  echo $user."<br>";
  include 'image.inc.php';
  echo "<br>";
  echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";
  echo "<br>";
  echo "<br><a href= logout.inc.php><input type=button value=logout></a>";
  echo "<br><a href= product.inc.php><input type=button value=backToProductsPage></a>";
}else {
  echo "<script>alert(Please Login!)</script>";
  header('location: ../login.php');
}



?>

<?php
session_start();
isset($_SESSION['uname']);
if (isset($_POST['login'])) {

echo "welcome to product page";
echo $_POST['username1'];
}
$uname   ='';
$password='';

$conn = new mysqli('127.0.0.1','root','','training');
$sqli  = "SELECT * FROM registration WHERE username = '$uname' AND password= '$password'";
$result= $conn->query($sqli);
$row=$result->fetch_array(MYSQLI_BOTH);
print_r($row);die();

$un=  $row['username'];
$pass=$row['password'];

if (isset($_POST['login'])) {
  $un1 = $_POST['username1'];
  $pass1 = $_POST['password1'];
  //$rem  =$_POST['remember'];
  echo $_POST['username1'];

}

 if (isset($_SESSION['uname'])) {
    $un1  =$_POST['usna'];
    $pass1=$_POST['pas'];
    echo $_POST['un1'];

   if ($uname==$un1 && $password==$pass1) {
   echo "<h1>hey, welcome to my page</h1>";
   echo "<a href='product.php'>Image Upload</a><br>";
   echo "<a href='logout.php'><input type=button value=logout></a>";
 }else {
   echo "<script>alert(Username & password not matched!)</script>";
   header('location: login.php');
 }

}
else {
  //if () {
  //$_SESSION['uname']=$uname;$conn = new mysqli('127.0.0.1','root','','training');
  //$result= $conn->query($sqli);


  echo "<script>alert('username or password not matched!')</script>";
  header("location: login.php");


  //}
}

//@TODO:  set session to know the user is logged in;
// @TODO: On all the pages check whether user session has the data you have set
//@TODO: show welcome {Name} on each page reading the data from session
// @TODO: Create logout page to destroy the session
 ?>

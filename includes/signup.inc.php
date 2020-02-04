<?php
echo "<br>";
echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";
echo "<br>";

if (isset($_POST['Register'])){

  require 'dbh.inc.php';

  $name = $_POST['name'];
  $username = $_POST['uname'];
  $password = $_POST['pwd'];

  if (empty($name) || empty($username) || empty($password)) {
    //echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";

    echo "Enter all field data <br>";
    echo "<br><a href='../register.php'>Try signing up again!</a>";
  }
  else {

    $sql = "SELECT id FROM logincred WHERE username =?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
       header("Location: ../register.php?error=sqlerror");
       exit();
    } else {
  mysqli_stmt_bind_param($stmt,"s",$username);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
  $resultCheck = mysqli_stmt_num_rows($stmt);
  if ($resultCheck > 0) {
    echo "username already taken. Try with another one";
    echo "<br><a href='../register.php'>Sign up again!</a>";

  }
  else {

    $sql = "INSERT INTO logincred(name, username, userPassword) Values (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
       echo "sql error!";
       echo "<br><a href='../register.php'>Try signing up again!</a>";
    }else {
      $hashedPwd = password_hash($password,PASSWORD_DEFAULT);

      mysqli_stmt_bind_param($stmt,"sss",$name, $username, $hashedPwd);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      echo "you have successfully registered";
    }
  }
} }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);

} else {
  header("Location: ../register.php");
  exit();
}






// include 'registration.php';
// $connect = mysqli_connect("localhost", 'root', '', 'training');
//
// if (empty($_POST['name']) && empty($_POST['uname']) && empty($_POST['pwd'])) {
//   echo "<script>alert("all fields are required")";
// } else {
//     $name = $_POST['name'];
//     $uname= $_POST['uname'];
//     $pwd  = $_POST['pwd'];
//     $mdpassword = md5($pwd);
//     $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
//     echo "$name"."<br>"."$uname.<br>"."$hashedpwd";
//
//
//      $query = "INSERT INTO logincred(name,username,userPassword) VALUES('$name','$uname','$hashedpwd')";
//      if (mysqli_query($connect,$query)) {
//      echo '<script>alert("Registration Done!")</script>';
//     } else {
//      echo mysqli_error($connect);
//     }
//}
//session_start();
// if(isset($_POST["Register"])) {
//
//     $name = $_POST['name'];
//     $uname= $_POST['uname'];
//     $pwd  = $_POST['pwd'];
//     $mdpassword = md5($pwd);
//     $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
//     echo "$name"."<br>"."$uname.<br>"."$hashedpwd";
//
//     $query = "INSERT INTO logincred(name,username,userPassword) VALUES('$name','$uname','$hashedpwd')";
//     if (mysqli_query($connect,$query)) {
//         echo '<script>alert("Registration Done!")</script>';
//     } else {
//         echo mysqli_error($connect);
//     }
//
//   }

  //

  ?>

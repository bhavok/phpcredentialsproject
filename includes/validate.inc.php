<?php

if (isset($_POST['login'])) {

  require 'dbh.inc.php';

  echo "<br>";
  echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";
  echo "<br>";

  $user= $_POST['user'];
  $pass= $_POST['pass'];

  if (empty($user) || empty($pass)) {
    echo "<script>alert(Fields can not be empty!)</script>";
    echo "<br>";
    echo "Fields can not be empty <a href= '../login.php'>try again </a>";
    echo "<br";
    // header("Location: ../login.php?error=emptyfields");
    // exit();
  } else {
    $sql = "SELECT * FROM logincred WHERE id=? OR username=? ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../login.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "ss", $user, $user);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($pass, $row['userPassword']);
        if ($pwdCheck == false) {
          //echo "<script>alert('Incorrect password!')</script>";
          // header ("Location: ../login.php?error=wrongpassword");

         echo "inncorrect password click here to <a href= '../login.php'>try again </a>";

        }
        elseif ($pwdCheck == true) {
          session_start();
          $_SESSION['name'] = $row['name'];
          $_SESSION['username'] = $row['username'];
          $name = $row['name'];
          echo "welcome .$name !";
          echo "  you have successfully logged in!";

          if (isset($_POST['remember'])) {
                  setcookie('user', $user, time() + 900);
                  setcookie('pass', $pass, time() + 900);
               }
          echo "<br><a href= 'product.inc.php'><input type=button value=product></a><br>";
          echo "<br>";
          echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";
          echo "<br>";
          echo "<a href= 'logout.inc.php'><input type=button value=logout></a>"."<br>";

          //header ("Location: ../login.php?login=success");
          //exit();
        }
      }
      else {

        echo "<br>";
        echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";
        echo "<br>";
        echo "Incorrect username or password<br> click here to <a href= '../login.php'>try again </a>";

        //header ("Location: ../login.php?error=nouser");
        //exit();
      }
    }
  }

}
else {
  header("Location: ../login.php");
  exit();
}



// $conn = new mysqli('127.0.0.1','root','','training');
//
// if (isset($_POST['user'])){
//     $user= $_POST['user'];
//     $pass= $_POST['pass'];
//     $result = mysqli_query($conn, "SELECT name FROM logincred
//                         WHERE username='$user' AND userPassword = '$pass';");
//     $row = mysqli_fetch_array($result);
//     // $hashedpwd = $row['pwd'];
//     // $dehashedpwd = password_verify($pass,$hashedpwd)
//     $name = $row['name'];
//     echo "$name";
//     //$result1 = mysqli_query($result);
//     if (mysqli_num_rows($result)==1){
//      echo "  you have successfully logged in!";
//      session_start();
//      $_SESSION['user']=$name;
//      if (isset($_POST['remember'])) {
//        setcookie('user', $user, time() + 900);
//        setcookie('pass', $pass, time() + 900);
//      }
//      echo "<br><a href= 'product.php'><input type=button value=product></a><br>";
//      echo "<a href= 'logout.php'><input type=button value=logout></a>"."<br>";
//
//
//     } else {
//      echo "you have entered wrong id or password .<br> click here to <a href= 'login.php'>try again </a>";
//    }
// } elseif ($conn->connect_error) {
//      die ("connection failed: ".connect_error);
// }

   //fetching username from mysql databse
   //$sqluser = "SELECT `name` FROM logincred WHERE username = '$user' and userPassword ='$pass'";

//  $row = mysqli_fetch_array($result);
//  $name= $row['name'];
//
//  if ($result != "" || isset($_SESSION['user'])){
//      //echo "hi";
//     session_start();
//     $_SESSION['user']=$name;
//     if (isset($_POST['remember'])) {
//          setcookie('user', $user, time() + 900);
//          setcookie('pass', $pass, time() + 900);
//     }
//     echo "Welcome: ".$name;
//     echo "<br><a href= 'product.php'><input type=button value=product></a><br>";
//     echo "<a href= 'logout.php'><input type=button value=logout></a>"."<br>";
//
// } else {
//       echo "username or password not matched.<br> click here to <a href= 'login.php'>try again </a>";
//   }

  ?>

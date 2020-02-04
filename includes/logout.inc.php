<?php
session_start();
session_unset();
session_destroy();
header("Location: ../login.php");

// if (isset($_SESSION['name'])){
//     session_destroy();
//     echo "<script>location.href='login.php'</script>";
// } else {
//     echo "<script>location.href='login.php'</script>";
// }

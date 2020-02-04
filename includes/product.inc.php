<?php
session_start();
if (isset($_SESSION['name']))
{
    echo "<h2>Welcome to product page</h2><br>";
    echo "<br>welcome...";

    $user = $_SESSION['name'];
    echo $user."<br>";
    echo "<br>";
    echo "<br><a href= '../index.php'><input type=button value=Home></a><br>";
    echo "<br>";
    echo "<br><a href='imageupload.inc.php'><input type=button name=Upload_image value=upload-files></a><br>";
    echo "<br><a href= 'logout.inc.php'><input type=button value=logout></a>";
}
else {
  //echo "<script>location.href='login.php'</script>";
  header("location: login.php");
}
?>

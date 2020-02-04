<?php

echo "<br>";
echo "<br><a href= 'index.php'><input type=button value=Home></a><br>";
echo "<br>";

 ?>

<!DOCTYPE html>
<html>
<head>

</head>
<body><h1 align="center">REGISTRATION PAGE</h1>

  <form method="post" action="includes/signup.inc.php" enctype="multipart/form-data"><p align="center">
  Name    :    <input type="text" name="name"><br>
  UserName:<input type="text" name="uname"><br>
  Password:<input type="password" name="pwd"><br>
  <input type="submit" name="Register"></p>
</form>
</body>
</html>

<?php
//include("insert.php");
// $nm = $_GET['name'];
// $un = $_GET['uname'];
// $pd = $_GET['pwd'];
//
// echo $nm;
// echo $un;
// echo $pd;


?>

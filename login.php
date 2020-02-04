<?php

echo "<br>";
echo "<br><a href= 'index.php'><input type=button value=Home></a><br>";
echo "<br>";
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
</head>
<style type="text/css">
<table
{
     margin-top: 150px;
     border: 1px solid;
     background-color: #eee;
}

td
{
     border: 0px;
     padding: 10px;
}
th
{
     border-bottom: 1px solid;
     background-color: #ddd;
}


</style>
<body>
<form action="includes/validate.inc.php" method="post">
  <table align="center">
  <tr>
    <th colspan="2"><h2 align="center">Login Page</h2></th>
  <tr><td>UserName:</td>
  <td><input type="text" id="user" name="user"</td></tr>
  <tr><td>Password:</td>
  <td><input type="password" id="pass" name="pass"</td></tr>
  <tr><td><input type="checkbox" name="remember" value="1">Remember Me</td></tr>
  <tr><td><input type="submit" name="login" value="login"</td></tr>
</form>


</body>
</html>
<?php

if (isset($_COOKIE['user']) and isset($_COOKIE['pass'])) {
  $user = $_COOKIE['user'];
  $pass = $_COOKIE['pass'];

  echo "<script>
        document.getElementById('user').value='$user';
        document.getElementById('pass').value='$pass';
      </script>";
}

?>

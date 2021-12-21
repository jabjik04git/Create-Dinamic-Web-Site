<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);

if ($conn->connect_error) die ("Fatal Error");

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
    {
      $un_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
      $pw_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);
      $query = "SELECT * FROM users WHERE username='$un_temp'";
      $result = $conn->query($query);
      if (!$result) die("User not found");
      else if ($result->num_rows)
      {
        $row = $result->fetch_array(MYSQLI_NUM);
        $result->close();

        if (password_verify($pw_temp, $row[3])) echo
        htmlspecialchars("$row[0] $row[1] :
        Hi row[0], you are now logged in as '$row[2]'");
      
      else die("Неверная комбинация имя пользователя - пароль");
      }
    else die ("Неверная комбинация имя пользователя - пароль");
  }
    else 
    {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      die ("Please Enter your name and password");
    }
    $conn->close();

    function mysql_entities_fix_string($conn, $string) 
    { 
      return htmlentities(mysql_fix_string($conn,$string))
    }
    function mysql_fix_string($conn,$string) {
      if (get_magic_quotes_gpc()) $string = stripslashes($string);
      return $conn->real_excape_string($string);
    }
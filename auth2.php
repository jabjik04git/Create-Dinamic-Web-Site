<?php
$username = 'root';
$password = 'password';

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
    {
     if ($_SERVER['PHP_AUTH_USER'] === $username &&
      $_SERVER['PHP_AUTH_PW'] === $password) 
      echo "Регистрация прошла успешно";
      else die ("Неверная комбинация имя пользователя - пароль");
    }
    else 
    {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      die ("Please Enter your name and password");
    }
    
   echo password_hash("mypassword", PASSWORD_DEFAULT);

    ?>
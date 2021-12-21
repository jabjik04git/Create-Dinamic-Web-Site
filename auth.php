<?php


if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
    {
      echo "Пользователь: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) .
            "<br>Пароль:      " . htmlspecialchars($_SERVER['PHP_AUTH_PW']);
    }
    else 
    {
      header('WWW-Authenticate: Basic realm="Restricted Area"');
      header('HTTP/1.0 401 Unauthorized');
      die ("Please Enter your name and password");
    }
    ?>
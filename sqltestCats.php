<?php // sqltest.php
  require_once 'login.php';
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die("Fatal Error");

  if (isset($_POST['delete']) && isset($_POST['id']))
  {
    $id   = get_post($conn, 'id');
    $query  = "DELETE FROM cats WHERE id='$id'";
    $result = $conn->query($query);
    if (!$result) echo "DELETE failed<br><br>";
  }

  if (isset($_POST['id'])   &&
      isset($_POST['family'])    &&
      isset($_POST['age']))
  {
    $id   = get_post($conn, 'id');
    $family    = get_post($conn, 'family');
    $age = get_post($conn, 'age');
    $query    = "INSERT INTO cats VALUES
      ('$id', '$family', '$age')";
    $result   = $conn->query($query);
    if (!$result) echo "INSERT failed<br><br>";
  }

  echo <<<_END
  <form action="sqltestCats.php" method="post"><pre>
    ID <input type="text" name="id">
     Family <input type="text" name="family">
     age <input type="text" name="age">
         <input type="submit" value="ADD RECORD">
  </pre></form>
_END;

  $query  = "SELECT * FROM cats";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed");

  $rows = $result->num_rows;

  for ($j = 0 ; $j < $rows ; ++$j)
  {
    $row = $result->fetch_array(MYSQLI_NUM);

    $r0 = htmlspecialchars($row[0]);
    $r1 = htmlspecialchars($row[1]);
    $r2 = htmlspecialchars($row[2]);

    
    echo <<<_END
  <pre>
     ID         $r0
     Family     $r1
     Age        $r2
 
      
  </pre>
  <form action='sqltestCats.php' method='post'>
  <input type='hidden' name='delete' value='yes'>
  <input type='hidden' name='id' value='$r0'>
  <input type='submit' value='DELETE RECORD'></form>
_END;
  }

  $result->close();
  $conn->close();

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
?>
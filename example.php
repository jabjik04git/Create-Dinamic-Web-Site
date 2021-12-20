<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die ("Fatal Error");

$query = "INSERT INTO customers VALUES 
(NULL,'Emma Brown','1565 Rinbow Road',90014),
(null,'Darren Ryder','4759 Emily Drive',23219),
(null,'Earl B. Thurston','862 Gregory Lane',40601),
(null,'David Miller','3647 Cedar Lane',02154)";
$result = $conn->query($query);
if (!$result) die ('Сбой при доступе к базе данных');
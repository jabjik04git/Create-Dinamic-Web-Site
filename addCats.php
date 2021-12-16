<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die ("Fatal Error");

$query = "INSERT INTO cats VALUES
(NULL, 'Tiger', 2),
(NULL, 'Gepard',1),
(NULL, 'Home Cat',5),
(NULL, 'Leopard',10)";
$result = $conn->query($query);
if (!$result) die ("Сбой при доступе к базе данных");



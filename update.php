<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die ("Fatal Error");
$query = "UPDATE cats SET age='15' WHERE age='10'";
$result = $conn->query($query);
if (!$result) die ("Сбой при доступе к базе данных");
?>
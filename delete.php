<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die ("Fatal Error");

$query = "DELETE FROM customers WHERE name='Earl B. Thurston'";
$result = $conn->query($query);
if (!$result) die ("Сбой при доступе к базе данных");
?>
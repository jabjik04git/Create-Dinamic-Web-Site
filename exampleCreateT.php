<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die ("Fatal Error");

$query = "CREATE TABLE customers(
    custNo INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    address VARCHAR(50),
    zip CHAR(5),
    PRIMARY KEY(custNo),
    INDEX(name(20)),
    INDEX(address(20)),
    INDEX(zip))";
    $result = $conn->query($query);
    if (!$result) die ("Сбой при доступе к базе данных");
?>
<?php
require_once 'login.php';
$conn = new mysqli($hn,$un,$pw,$db);
if ($conn->connect_error) die ("Fatal Error");

$stmt = $conn->prepare('INSERT INTO classics VALUES(?,?,?,?,?)');
$stmt->bind_param('sssss', $author,$title,$category,$year,$isbn);

$author = 'Anton Chehov';
$title = 'Tree Sisters';
$category = 'Classic Fiction';
$year = '1905';
$isbn = '1111111111112';

$stmt->execute();
printf("%d Row inserted. \n", $stmt->affected_rows);
$stmt->close();
$conn->close();
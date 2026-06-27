<?php

$host = "localhost";
$user = "root";
$pass = "5221040728";
$dbname = "football_community";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
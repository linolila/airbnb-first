<?php
$host = "localhost";
$dbname = "airbnb_db";
$username = "root";
$password = "";

$connection = new mysqli($host, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// echo "Connected successfully";
?>
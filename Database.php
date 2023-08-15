<?php
$host="localhost";
$dbname="airbnb_db";//create a db using phpMyAdmin
$username="root";
$password="";
$connection=new mysqli(hostname:$host,
username:$username,
password:$password,
database:$dbname);
if ($connection->connect_error){
    die("Could not connect to".$connection->connect_error);
}
return $connection;

?>
<?php

$servername = "localhost";
$username = "root";
$password = "Rohit@45";     // Change this if your MySQL has a password
$database = "parking_slot_demo";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
}

?>
<?php

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "school";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Error connecting to the database');
} 
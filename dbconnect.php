<?php
// Database configuration
$host = "localhost";       
$user = "root";             
$password = "";            
$database = "inventory-booking"; 

// Create connection
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

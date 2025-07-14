<?php
$config = include 'config.php';

$host = $config['host'];
$user = $config['user'];
$password = $config['password'];
$database = 'company_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
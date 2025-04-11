<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');  // Replace with your database username
define('DB_PASSWORD', '');      // Replace with your database password
define('DB_NAME', 'india_imports');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
// Database configuration
$host = 'localhost';
$db_name = 'lcpd-system';
$username = 'root';
$password = '';

// Create a connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set the charset to UTF-8 for proper encoding
$conn->set_charset("utf8");

// You can use this connection in your other scripts
// Example: include 'db_connection.php';

// Close the connection when done
// $conn->close();
?>

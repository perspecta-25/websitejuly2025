<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$host = 'localhost';
$db = 'websitejuly2025_db';
$user = 'websitejuly2025_u';
$pass = 'l9jA9Na9PRArM60';

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if table 'contacts' exists
$tableExists = false;
$result = $conn->query("SHOW TABLES LIKE 'contacts'");

if ($result && $result->num_rows > 0) {
    $tableExists = true;
}

// Create table if it doesn't exist
if (!$tableExists) {
    $sql = "
        CREATE TABLE contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone_number VARCHAR(10) NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";

    if ($conn->query($sql) === TRUE) {
        echo "Table 'contacts' created successfully.\n";
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }
} else {
    echo "Table 'contacts' already exists. Skipping creation.\n";
}

// Close the connection
$conn->close();
?>
<?php

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    die("All fields are required.");
}

$host = 'localhost';
$dbname = 'websitejuly2025_db';
$user = 'websitejuly2025_u';
$pass = 'l9jA9Na9PRArM60';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn -> connect_error);
}

$stmt = $conn -> prepare("INSERT INTO contacts (name, email, phone_number, message) VALUES (?, ?, ?, ?)");
$stmt -> bind_param("ssss", $name, $email, $phone, $message);

if ($stmt -> execute()) {
    echo "Message recieved. Thank you!";
} else {
    echo "Error: " . $stmt -> error;
}

$stmt -> close();
$conn -> close();

?>
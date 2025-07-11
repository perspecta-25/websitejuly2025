<?php

$host = 'localhost';
$dbname = 'websitejuly2025_db';
$user = 'websitejuly2025_u';
$pass = 'l9jA9Na9PRArM60';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'error' => 'Connection failed']);
    exit;
}

$id = $_GET['id'] ?? '';

if (!is_numeric($id)) {
    echo json_encode(['success' => false, 'error' => 'Invalid ID']);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($contact = $result->fetch_assoc()) {
    echo json_encode(['success' => true, 'contact' => $contact]);
} else {
    echo json_encode(['success' => false, 'error' => 'No contact found']);
}

$stmt->close();
$conn->close();

?>
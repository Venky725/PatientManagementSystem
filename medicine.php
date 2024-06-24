<?php
$conn = new mysqli('localhost', 'root', '', 'register');
if ($conn->connect_error) {
    die("Failed to connect : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT medicine FROM patientregister ");
    $stmt->bind_param("s", $Medicine);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
}
?>
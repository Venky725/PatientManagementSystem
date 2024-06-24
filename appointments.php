<?php
$conn = new mysqli('localhost', 'root', '', 'register');
if ($conn->connect_error) {
    die("Failed to connect : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT * FROM patientregister ");
    // $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
}
?>
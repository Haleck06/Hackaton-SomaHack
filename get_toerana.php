<?php
require_once 'includes/db.php';

$db = new Database();
$conn = $db->connect();

$stmt = $conn->query("SELECT * FROM toerana");
$toerana = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($toerana);

<?php
header("Content-Type: application/json");

// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "zahavamada");
if ($conn->connect_error) {
    die(json_encode(["reply" => "Olana amin'ny fifandraisana amin'ny base."]));
}

$question = strtolower(trim($_POST['message'] ?? ''));

$response = "Miala tsiny, tsy azoko tsara izany.";

if (strpos($question, 'rova') !== false) {
    $result = $conn->query("SELECT famaritana FROM rova LIMIT 1");
    if ($row = $result->fetch_assoc()) {
        $response = $row['famaritana'];
    } else {
        $response = "Tsy mbola misy angon-drakitra momba ny Rova.";
    }
}
elseif (strpos($question, 'fady') !== false) {
    $result = $conn->query("SELECT famaritana FROM fady ORDER BY RAND() LIMIT 1");
    if ($row = $result->fetch_assoc()) {
        $response = $row['famaritana'];
    } else {
        $response = "Tsy mbola misy fady voatahiry.";
    }
}
elseif (strpos($question, 'faritra') !== false) {
    $result = $conn->query("SELECT anarana, famaritana FROM faritra ORDER BY RAND() LIMIT 1");
    if ($row = $result->fetch_assoc()) {
        $response = "Faritra: " . $row['anarana'] . " — " . $row['famaritana'];
    }
}
elseif (strpos($question, 'foko') !== false) {
    $result = $conn->query("SELECT anarana, famaritana FROM foko ORDER BY RAND() LIMIT 1");
    if ($row = $result->fetch_assoc()) {
        $response = "Foko: " . $row['anarana'] . " — " . $row['famaritana'];
    }
}

echo json_encode(["reply" => "🤖 " . $response]);

<?php
header("Content-Type: application/json");

// Connexion à la base de données
$host = "localhost";
$user = "root";
$password = "";
$dbname = "zahavamada";

$conn = new mysqli($host, $user, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    echo json_encode(["response" => "Tsy afaka mifandray amin'ny tahiry."]);
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$userMessage = strtolower(trim($data["message"] ?? ""));

if (empty($userMessage)) {
    echo json_encode(["response" => "Azafady, soraty ny fanontanianao."]);
    exit;
}

// Analyse mots-clés pour les fady (foko, faritra, karazana)
function find_keyword($message, $table, $column, $conn) {
    $sql = "SELECT $column FROM $table";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        if (strpos($message, strtolower($row[$column])) !== false) {
            return $row[$column];
        }
    }
    return null;
}

// ---------- Analyse des fady ----------
$tablesFady = [
    ["table" => "foko", "column" => "anarana", "label" => "foko", "join" => "JOIN foko fo ON f.id_foko = fo.id_foko", "on" => "fo.anarana = ?"],
    ["table" => "faritra", "column" => "anarana", "label" => "faritra", "join" => "JOIN faritra fa ON f.id_faritra = fa.id_faritra", "on" => "fa.anarana = ?"],
    ["table" => "karazana_fady", "column" => "anarana", "label" => "karazana", "join" => "JOIN karazana_fady k ON f.id_karazana = k.id_karazana", "on" => "k.anarana = ?"]
];

foreach ($tablesFady as $tf) {
    $value = find_keyword($userMessage, $tf["table"], $tf["column"], $conn);
    if ($value) {
        $stmt = $conn->prepare("
            SELECT f.famaritana, k.anarana AS karazana, f.vokatra 
            FROM fady f 
            {$tf['join']}
            JOIN karazana_fady k ON f.id_karazana = k.id_karazana 
            WHERE {$tf['on']}
        ");
        $stmt->bind_param("s", $value);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows > 0) {
            $reponse = "Ireto ny fady amin'ny {$tf['label']} <strong>$value</strong>:<br/>";
            while ($row = $res->fetch_assoc()) {
                $reponse .= "- " . $row["famaritana"];
                if (!empty($row["vokatra"])) {
                    $reponse .= " (Vokatra: " . $row["vokatra"] . ")";
                }
                $reponse .= "<br/>";
            }
            echo json_encode(["response" => $reponse]);
            exit;
        }
    }
}

// ---------- Analyse des autres tables culturelles/historiques ----------
$tablesInfos = [
    "jeografia" => ["sokajy", "votoaty", "fanampiny"],
    "tantara" => ["vanim-potoana", "lohateny", "antsipirihany"],
    "kolontsaina" => ["karazana", "famaritana", "faritra"],
    "fanjakana_taloha" => ["anarana", "faritra", "taona", "mpanjaka_voalohany", "famaritana"],
    "filoha" => ["anarana", "fotoana_mitondra", "zava_miavaka"],
    "fivoarana" => ["sehatra", "zava_nitranga", "taona"]
];

foreach ($tablesInfos as $table => $columns) {
    if (strpos($userMessage, $table) !== false) {
        $colList = implode(", ", $columns);
        $res = $conn->query("SELECT $colList FROM $table LIMIT 5");
        if ($res && $res->num_rows > 0) {
            $response = "";
            while ($row = $res->fetch_assoc()) {
                foreach ($row as $key => $val) {
                    if (!empty($val)) {
                        $response .= "🔹 <strong>" . ucfirst(str_replace("_", " ", $key)) . ":</strong> $val<br/>";
                    }
                }
                $response .= "<br/>";
            }
            echo json_encode(["response" => $response]);
            exit;
        }
    }
}

// ---------- Si rien n’est détecté ----------
echo json_encode(["response" => "Tsy azoko antoka ny valiny. Azafady, manonona foko, faritra, karazana fady, jeografia, tantara, sns."]);
exit;

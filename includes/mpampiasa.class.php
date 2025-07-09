<?php
require_once 'db.php';

class Mpampiasa {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function misoratra($anarana, $email, $tenimiafina) {
        $tenimiafina = password_hash($tenimiafina, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO mpampiasa (anarana, email, tenimiafina) VALUES (?, ?, ?)");
        return $stmt->execute([$anarana, $email, $tenimiafina]);
    }

    public function miditra($email, $tenimiafina) {
        $stmt = $this->conn->prepare("SELECT * FROM mpampiasa WHERE email = ?");
        $stmt->execute([$email]);
        $mpampiasa = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($mpampiasa && password_verify($tenimiafina, $mpampiasa['tenimiafina'])) {
            return $mpampiasa;
        }
        return false;
    }
}
?>

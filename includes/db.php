<?php
// db.php
class Database {
    private $host = "localhost";
    private $db_name = "zahavamada";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}",
                                  $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Tsy afaka mifandray amin'ny base de données: " . $e->getMessage());
        }
    }
}
?>

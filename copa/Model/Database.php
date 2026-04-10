<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'copa_db';
    private $user = 'root';
    private $password = 'alunolab';
    public $conn;
    
    public function getConnection() {
        $this->conn = null;
    
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
            die();
        }
    
        return $this->conn;
    }
}



?>
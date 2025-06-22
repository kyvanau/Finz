<?php
class Model {
    protected $db;
    
    public function __construct() {
        try {
            // Include database config
            require_once __DIR__ . '/../config/database.php';
            $database = new Database();
            $this->db = $database->connect();
        } catch (Exception $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
?>


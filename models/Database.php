<?php
require_once __DIR__ . '/../config/database.php';

class BaseModel {
    protected $db;

    public function __construct() {
        try {
            $this->db = new PDO("mysql:host=localhost;port=3307;dbname=FinZ", "root", "");
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}


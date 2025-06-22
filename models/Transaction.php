<?php
require_once __DIR__ . '/Database.php';

class Transaction extends BaseModel {
    
    public function __construct() {
        parent::__construct(); // WAJIB panggil parent constructor
    }

    public function getTodayOutcome() {
    $stmt = $this->db->prepare("
        SELECT COALESCE(SUM(amount), 0) as outcome
        FROM transactions
        WHERE type = 'outcome' AND DATE(created_at) = CURDATE()
    ");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['outcome'];
}

    public function getTransactionsBetween($startDate, $endDate) {
    $stmt = $this->db->prepare("
        SELECT DATE(created_at) as date, SUM(amount) as total, type, description, created_at
        FROM transactions
        WHERE DATE(created_at) BETWEEN ? AND ?
        GROUP BY DATE(created_at), type
        ORDER BY created_at
    ");
    $stmt->execute([$startDate, $endDate]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTransactionsBetween($startDate, $endDate) {
    $stmt = $this->db->prepare("
        SELECT DATE(created_at) as date, category, description, amount, type
        FROM transactions
        WHERE DATE(created_at) BETWEEN ? AND ?
        ORDER BY DATE(created_at), created_at
    ");
    $stmt->execute([$startDate, $endDate]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    
    public function getTransactionsByPeriod($period = 'week') {
        if ($period === 'week') {
            $stmt = $this->db->prepare("
                SELECT DATE(created_at) as date, SUM(amount) as total, type
                FROM transactions 
                WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                GROUP BY DATE(created_at), type
                ORDER BY date
            ");
        } else {
            $stmt = $this->db->prepare("
                SELECT MONTH(created_at) as month, SUM(amount) as total, type
                FROM transactions 
                WHERE YEAR(created_at) = YEAR(CURDATE())
                GROUP BY MONTH(created_at), type
                ORDER BY month
            ");
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getDailyBalance() {
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(CASE WHEN type = 'income' THEN amount ELSE -amount END), 0) as balance 
            FROM transactions 
            WHERE DATE(created_at) = CURDATE()
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['balance'];
    }
    
    public function getMonthlyIncome() {
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(amount), 0) as income 
            FROM transactions 
            WHERE type = 'income' AND MONTH(created_at) = MONTH(CURDATE())
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['income'];
    }
    
    public function getMonthlyOutcome() {
        $stmt = $this->db->prepare("
            SELECT COALESCE(SUM(amount), 0) as outcome 
            FROM transactions 
            WHERE type = 'outcome' AND MONTH(created_at) = MONTH(CURDATE())
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['outcome'];
    }
    
    public function addTransaction($amount, $type, $description = '') {
        $stmt = $this->db->prepare("
            INSERT INTO transactions (amount, type, description, created_at) 
            VALUES (?, ?, ?, NOW())
        ");
        return $stmt->execute([$amount, $type, $description]);
    }
    
    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM transactions ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTransactionAPI($amount, $type, $description = '', $category = '') {
    $stmt = $this->db->prepare("
        INSERT INTO transactions (amount, type, description, category, created_at)
        VALUES (?, ?, ?, ?, NOW())
    ");
    return $stmt->execute([$amount, $type, $description, $category]);
    }

}
?>

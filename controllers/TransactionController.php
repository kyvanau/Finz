<?php
require_once '../models/Transaction.php';

class TransactionController {
    private $transactionModel;
    
    public function __construct() {
        $this->transactionModel = new Transaction();
    }
    
    public function addOutcome() {
        if ($_POST) {
            $amount = $_POST['amount'];
            $description = $_POST['description'] ?? '';
            
            if ($this->transactionModel->addTransaction($amount, 'outcome', $description)) {
                header('Location: index.php?page=dashboard&success=1');
            } else {
                header('Location: index.php?page=dashboard&error=1');
            }
        }
    }
    
    public function addIncome() {
        if ($_POST) {
            $amount = $_POST['amount'];
            $description = $_POST['description'] ?? '';
            
            if ($this->transactionModel->addTransaction($amount, 'income', $description)) {
                header('Location: index.php?page=dashboard&success=1');
            } else {
                header('Location: index.php?page=dashboard&error=1');
            }
        }
    }
}
?>

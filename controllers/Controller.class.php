<?php
require_once '../config/database.php';
require_once '../models/Transaction.php';
require_once '../models/Budget.class.php';

class Controller {
    
    protected $model;
    protected $transactionModel;

    public function __construct() {
        $this->model = new Budget();
        $this->transactionModel = new Transaction(); // model dari database
    }

    public function index() {
    $monthlyIncome = $this->transactionModel->getMonthlyIncome();
    $todayOutcome = $this->transactionModel->getTodayOutcome();
    $monthlyOutcome = $this->transactionModel->getMonthlyOutcome();

    // Daily limit dari income sebulan
    $dailyLimit = $monthlyIncome / 30;

    // Sisa harian = daily limit - pengeluaran hari ini
    $dailyBalance = $dailyLimit - $todayOutcome;

    $this->view('dashboard/index.php', [
        'dailyBalance' => $dailyBalance,
        'monthlyIncome' => $monthlyIncome,
        'monthlyOutcome' => $monthlyOutcome
    ]);
    
}


    public function submitIncome() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $amount = $_POST['amount'];

            // Simpan ke session
            $this->model->insertIncome($amount);

            // Simpan juga ke database
            $this->transactionModel->addTransaction($amount, 'income', 'Pemasukan');

           header('Location: index.php?c=Controller&m=index');
            exit();
        } else {
            include '../views/spend/submit_income.php';
        }
    }

        function model($model) {
            require_once "../models/$model.class.php";  
            return new $model();
        }
        
        
        function view($view, $data = []) {
            foreach ($data as $key => $value) $$key = $value;
            include __DIR__ . "/../views/$view";
        }



    public function submitOutcome() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $kategori = $_POST['kategori'] ?? '';
        $harga = (int)($_POST['harga'] ?? 0);

        // Simpan juga ke database
        $this->transactionModel->addTransaction($harga, 'outcome', $kategori);

        header("Location: index.php?c=Controller&m=index");
        exit;
    } else {
        include '../views/spend/submit_outcome.php';
    }
}

}

?>

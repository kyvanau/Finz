<?php
require_once 'Controller.class.php';

class Home extends Controller {
    function index() {
        // Ambil data dari model
        $data = $this->model->getData(); // model = Budget
            $dailyBalance = $this->transactionModel->getDailyBalance();
            $monthlyIncome = $this->transactionModel->getMonthlyIncome();
            $monthlyOutcome = $this->transactionModel->getMonthlyOutcome();
    
            $data = [
                'dailyBalance' => number_format($dailyBalance, 2, ',', '.'),
                'monthlyIncome' => number_format($monthlyIncome, 2, ',', '.'),
                'monthlyOutcome' => number_format($monthlyOutcome, 2, ',', '.')
            ];
    
            $this->view('dashboard/index.php', $data);
       
    }
}

<?php
session_start();

class Budget {
    public function insertIncome($amount) {
        $_SESSION['income'] = $amount;
    }

    public function addOutcome($kategori, $harga) {
        $_SESSION['outcome'][] = ['kategori' => $kategori, 'harga' => $harga];
    }

    public function getData() {
    $income = (float) ($_SESSION['income'] ?? 0);
    $outcomeList = $_SESSION['outcome'] ?? [];
    $totalOutcome = array_sum(array_column($outcomeList, 'harga'));

    $dailyIncome = $income / 30;
    $dailyBalance = $dailyIncome - ($totalOutcome / 30); // outcome juga dibagi 30

    return [
        'income' => $income,
        'outcome' => $totalOutcome,
        'balance' => floor($dailyBalance),
    ];
}

    
    
}
<?php
require_once '../models/Transaction.php';
header('Content-Type: application/json');

$transactionModel = new Transaction();

$dailyBalance = $transactionModel->getDailyBalance();
$monthlyIncome = $transactionModel->getMonthlyIncome();
$monthlyOutcome = $transactionModel->getMonthlyOutcome();
$all = $transactionModel->getAll();

$response = [
    'daily_balance' => (float)$dailyBalance,
    'monthly_income' => (float)$monthlyIncome,
    'monthly_outcome' => (float)$monthlyOutcome,
    'total_transactions' => count($all)
];

echo json_encode($response);

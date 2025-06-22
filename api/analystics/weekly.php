<?php
require_once __DIR__ . '/../../models/Transaction.php';
header('Content-Type: application/json');

$transactionModel = new Transaction();
$transactions = $transactionModel->getTransactionsByPeriod('week');

$labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
$data = array_fill(0, 7, 0);

foreach ($transactions as $t) {
    if ($t['type'] === 'outcome') {
        $dayIndex = (int)(new DateTime($t['date']))->format('N') - 1;
        $data[$dayIndex] += $t['total'];
    }
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);

<?php
require_once __DIR__ . '/../../models/Transaction.php';
header('Content-Type: application/json');

$transactionModel = new Transaction();
$transactions = $transactionModel->getTransactionsByPeriod('month');

// Label bulan Jan–Des
$labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
$data = array_fill(0, 12, 0); // isi awal: [0,0,...,0]

// Isi data outcome per bulan
foreach ($transactions as $t) {
    if ($t['type'] === 'outcome') {
        $index = (int)$t['month'] - 1; // bulan Jan = 0, Feb = 1, dst
        $data[$index] += $t['total'];
    }
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);


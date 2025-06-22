<?php
require_once '../models/Transaction.php';
header('Content-Type: application/json');

$transactionModel = new Transaction();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = $transactionModel->getAll(); 
    echo json_encode($data);
}

elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['amount'], $input['type'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Field "amount" dan "type" wajib diisi.']);
        exit;
    }

    $amount = $input['amount'];
    $type = $input['type'];
    $description = $input['description'] ?? '';
    $category = $input['category'] ?? '';

    $success = $transactionModel->addTransactionAPI($amount, $type, $description, $category);

    if ($success) {
        echo json_encode(['message' => 'Transaksi berhasil ditambahkan!']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Gagal menyimpan transaksi']);
    }
}



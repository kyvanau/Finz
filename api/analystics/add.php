<?php
require_once '../../models/SaveModel.class.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['tabungan'], $data['bulan'])) {
    echo json_encode(['status' => 'error', 'message' => 'Missing tabungan or bulan']);
    exit;
}

try {
    $model = new SaveModel();
    $model->insert($data['tabungan'], $data['bulan']);

    echo json_encode(['status' => 'success', 'message' => 'Tabungan berhasil ditambahkan!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}

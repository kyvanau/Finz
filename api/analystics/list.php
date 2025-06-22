<?php
require_once '../../models/SaveModel.class.php';
header('Content-Type: application/json');

try {
    $model = new SaveModel();
    $data = $model->getAll(); // total semua
    $perBulan = $model->getTotalPerBulan(); // tabungan tiap bulan

    echo json_encode([
        'status' => 'success',
        'total' => $data,
        'per_month' => $perBulan
    ]);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}


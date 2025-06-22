<?php
require_once 'Controller.class.php';

class ChartController {
    private $transactionModel;

    public function __construct() {
        $this->transactionModel = new Transaction();
    }

    public function weekly() {
    $week = isset($_GET['week']) ? (int)$_GET['week'] : 1;

    $start = match($week) {
        1 => 1,
        2 => 8,
        3 => 15,
        4 => 22,
        default => 1
    };
    $end = $start + 6;

    $startDate = date('Y-m') . '-' . str_pad($start, 2, '0', STR_PAD_LEFT);
    $endDate = date('Y-m') . '-' . str_pad(min($end, date('t')), 2, '0', STR_PAD_LEFT);

    // Query khusus minggu ke-n
    $transactions = $this->transactionModel->getTransactionsBetween($startDate, $endDate);

    $chartData = $this->processChartData($transactions, 'week');
    $weeklyDetails = $this->transactionModel->getAllTransactionsBetween($startDate, $endDate);

    include '../views/charts/weekly.php';
}



    public function monthly() {
    $transactions = $this->transactionModel->getTransactionsByPeriod('month');
    $chartData = $this->processChartData($transactions, 'month');

    // Ambil transaksi OUTCOME untuk bulan ini
    $currentMonth = date('n'); // tanpa 0 di depan, misalnya 6 (bukan "06")
    $monthlyDetails = array_filter($transactions, function ($t) use ($currentMonth) {
        return isset($t['month']) && (int)$t['month'] == $currentMonth && $t['type'] === 'outcome';
    });

    // Kirim semuanya ke view
    include '../views/charts/monthly.php';
    }


    private function processChartData($transactions, $period) {
    $data = [];
    $labels = [];

    if ($period === 'week') {
        $labels = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
        $harian = array_fill(0, 7, 0); // index 0 = Senin

        foreach ($transactions as $t) {
            if ($t['type'] === 'outcome') {
                $date = new DateTime($t['date']);
                $dayIndex = ((int)$date->format('N')) - 1; // Senin = 1 ➝ index 0
                $harian[$dayIndex] += (float)$t['total'];
            }
        }

        $data = array_values($harian);
    }

    if ($period === 'month') {
        $labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 
                   'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

        $bulanan = array_fill(1, 12, 0); // index bulan: 1–12

        foreach ($transactions as $t) {
            if ($t['type'] === 'outcome') {
                $month = (int)$t['month'];
                $bulanan[$month] += (float)$t['total'];
            }
        }

        $data = array_values($bulanan);
    }

    return [
        'labels' => $labels,
        'data' => $data
    ];
    }

}

?>

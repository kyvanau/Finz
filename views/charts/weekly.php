<?php ob_start(); ?>

<div class="chart-container">
    <div class="chart-header">
        <div class="chart-tabs">
        <a href="index.php?c=ChartController&m=weekly" class="btn btn-outline-primary">Grafik Mingguan</a>
        <a href="index.php?c=ChartController&m=monthly" class="btn btn-primary">Grafik Bulanan</a>
        </div>
    </div>
    
    <div class="chart-content">
    <h2>Grafik Mingguan</h2>
    <div class="chart-tabs">
    <?php for ($i = 1; $i <= 4; $i++) : ?>
        <a href="index.php?c=ChartController&m=weekly&week=<?= $i ?>"
           class="btn <?= ($_GET['week'] ?? 1) == $i ? 'btn-primary' : 'btn-outline-primary' ?>">
            Minggu ke-<?= $i ?>
        </a>
    <?php endfor; ?>
</div>
<canvas id="weeklyChart"></canvas>

<div class="chart-details">
    <div class="detail-items">
    <?php
    $grouped = [];
    foreach ($weeklyDetails as $row) {
        if ($row['type'] !== 'outcome') continue; // hanya pengeluaran
        $grouped[$row['date']][] = $row;
    }
    ?>

    <?php if (!empty($grouped)) : ?>
        <?php foreach ($grouped as $date => $items) : ?>
            <div class="detail-item">
                <strong><?= date('l, d M Y', strtotime($date)) ?></strong>
                <ul class="mb-2">
                    <?php foreach ($items as $item) : ?>
                        <li>
                        <?= htmlspecialchars($item['category'] ?: $item['description'] ?: '-') ?>: 
                        Rp <?= number_format($item['amount'], 2, ',', '.') ?>
                    </li>

                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p class="text-muted">Belum ada pengeluaran minggu ini.</p>
    <?php endif; ?>
</div>

</div>



<script>
const ctx = document.getElementById('weeklyChart').getContext('2d');
const weeklyChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($chartData['labels']) ?>,
        datasets: [{
            label: 'Spending',
            data: <?= json_encode($chartData['data']) ?>,
            borderColor: '#007bff',
            backgroundColor: 'rgba(0, 123, 255, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

<?php $content = ob_get_clean(); ?>
<?php include '../views/layouts/main.php'; ?>
<?php ob_start(); ?>

<div class="chart-container">
    <div class="chart-header">
        <div class="chart-tabs">
        <a href="index.php?c=ChartController&m=weekly" class="btn btn-primary">Grafik Mingguan</a>
        <a href="index.php?c=ChartController&m=monthly" class="btn btn-outline-primary">Grafik Bulanan</a>
        </div>
    </div>
    
    <div class="chart-content">
    <h2>Grafik Bulanan</h2>
    <canvas id="monthlyChart"></canvas>
    
   <div class="chart-details">
    <div class="detail-items">
        <?php if (!empty($monthlyDetails)) : ?>
            <?php foreach ($monthlyDetails as $t) : ?>
                <div class="detail-item">
                    <span>
                        <?= date('F', mktime(0, 0, 0, $t['month'] ?? date('n'))) ?>
                    </span>
                    <span>
                        Rp <?= number_format((float)($t['total'] ?? 0), 2, ',', '.') ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-muted">Belum ada pengeluaran bulan ini.</p>
        <?php endif; ?>
    </div>
</div>


<script>
const ctxMonthly = document.getElementById('monthlyChart').getContext('2d');
const monthlyChart = new Chart(ctxMonthly, {
    type: 'line',
    data: {
        labels: <?= json_encode($chartData['labels']) ?>,
        datasets: [{
            label: 'Monthly Spending',
            data: <?= json_encode($chartData['data']) ?>,
            borderColor: '#007bff',
            backgroundColor: 'rgba(0, 123, 255, 0.1)',
            fill: true,
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
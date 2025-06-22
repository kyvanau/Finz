<?php ob_start(); ?>

<div class="dashboard">
    <div class="balance-card">
        <h2>Daily Balance</h2>
        <div class="balance-amount">Rp <?= number_format((float)$dailyBalance, 2, ',', '.'); ?></div>
    </div>
    
    <div class="summary-cards">
        <div class="summary-card income">
            <div class="card-title">Monthly Income</div>
            <div class="card-amount">Rp <?= number_format((float)$monthlyIncome, 2, ',', '.'); ?></div>
        </div>
        <div class="summary-card outcome">
            <div class="card-title">Monthly Outcome</div>
            <div class="card-amount">Rp <?= number_format((float)$monthlyOutcome, 2, ',', '.'); ?></div>
        </div>
    </div>
    
    <div class="action-sections">
        <div class="section">
            <h3>Daily Spend</h3>
            <p>Measure your expenses!</p>
            <div class="chart-buttons">
            <a href="index.php?c=Controller&m=submitIncome" class="btn btn-primary">enter income</a>
            <a href="index.php?c=Controller&m=submitOutcome" class="btn btn-primary">enter outcome</a>
        </div>
        
        <div class="section">
            <div class="section" style="margin-top: 20px;">
            <h3>Savings</h3>
            <p>Monthly Savings Target</p>
            <a href="index.php?c=Save&m=form" class="btn btn-primary  mb-2 w-100">enter target</a><br>
            <a href="index.php?c=Save&m=list" class="btn btn-outline-primary  mb-2 w-100">Start!</a>
        </div>

        <div class="section">
            <h3>Spending Trend</h3>
            <p>Monthly Savings Target</p>
            <div class="chart-buttons">
            <a href="index.php?c=ChartController&m=weekly" class="btn btn-primary">Grafik Mingguan</a>
            <a href="index.php?c=ChartController&m=monthly" class="btn btn-primary">Grafik Bulanan</a>
            </div>
        </div>
    </div>
</div>

</div>
</div>

<!-- Modals -->
<div id="outcomeModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Add Outcome</h3>
        <form action="index.php?c=Controller&m=submitOutcome" method="POST">
            <input type="number" name="amount" placeholder="Amount" required>
            <input type="text" name="description" placeholder="Description">
            <button type="submit" class="btn btn-primary">Add Outcome</button>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include '../views/layouts/main.php'; ?>
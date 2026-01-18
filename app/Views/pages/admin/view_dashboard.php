<?= $this->extend('layout/main/view_main_admin') ?>
<?= $this->section('content') ?>
<div class="grid grid-cols-12 gap-6 p-8">
    <div class="col-span-6">
        <div class="stats shadow bg-white w-full">
            <div class="stat">
                <div class="stat-title">Total User</div>
                <div class="stat-value"><?= $totalUser ?></div>
                <div class="stat-desc">
                    <span class="<?= $userGrowth > 0 ? 'text-primary-500' : 'text-error' ?>">
                        <?= abs($userGrowth) ?>%
                    </span><?= $userGrowthText ?> than last month
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-6">
        <div class="stats shadow bg-white w-full">
            <div class="stat">
                <div class="stat-title">Total Kategori</div>
                <div class="stat-value"><?= $totalKategori ?></div>
                <div class="stat-desc">21% more than last month</div>
            </div>
        </div>
    </div>

    <div class="col-span-12">
        <div class="card bg-white shadow">
            <div class="card-body">
                <h2 class="card-title">Statistik Data</h2>
                <canvas id="dataChart" style="max-height: 400px;"></canvas>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('scripts') ?>
<script>
    const ctx = document.getElementById('dataChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total User', 'Total Kategori'],
            datasets: [{
                label: 'Jumlah Data',
                data: [<?= $totalUser ?>, <?= $totalKategori ?>],
                backgroundColor: [
                    'rgba(59, 130, 246, 0.8)', // Biru untuk User
                    'rgba(34, 197, 94, 0.8)' // Hijau untuk Kategori
                ],
                borderColor: [
                    'rgb(59, 130, 246)',
                    'rgb(34, 197, 94)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        callback: function(value) {
                            return Number.isInteger(value) ? value : '';
                        }
                    }
                }
            }
        }
    });
</script>
<?= $this->endSection(); ?>
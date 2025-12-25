<?= $this->extend('layout/main/view_main') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">

        <div id="transaksi-loading" class="space-y-4 hidden">
            <div class="skeleton h-6 w-1/3"></div>
            <div class="skeleton h-24 w-full"></div>
            <div class="skeleton h-32 w-full"></div>
        </div>
        <div id="transaksi-content">
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12">
                    <div class="flex flex-col-reverse md:flex-row items-center">
                        <div id="tabsContainer" role="tablist" class="tabs tabs-box w-full md:w-auto bg-shaded-white mt-3 md:mt-0"></div>
                        <select id="modeSelect" class="select w-full md:w-24 md:ml-3">
                            <option value="daily" selected>Harian</option>
                            <option value="monthly">Bulanan</option>
                        </select>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                    <p class="text-sm text-pale-gray">Total </p>
                    <p class="text-3xl text-primary-500 font-black">Rp. 313,500</p>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <div class="grid grid-cols-6 gap-5">
                        <!-- Pemasukan Pengeluaran -->
                        <div class="col-span-3 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                            <div class="flex flex-row items-center mb-1">
                                <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 36.6668C17.8113 36.6668 15.644 36.2357 13.622 35.3982C11.5999 34.5606 9.76254 33.3329 8.2149 31.7853C5.08929 28.6597 3.33334 24.4204 3.33334 20.0002C3.33334 15.5799 5.08929 11.3407 8.2149 8.21505C11.3405 5.08944 15.5797 3.3335 20 3.3335C22.1887 3.3335 24.356 3.76459 26.3781 4.60217C28.4002 5.43975 30.2375 6.66741 31.7851 8.21505C33.3328 9.76269 34.5604 11.6 35.398 13.6221C36.2356 15.6442 36.6667 17.8115 36.6667 20.0002C36.6667 24.4204 34.9107 28.6597 31.7851 31.7853C28.6595 34.9109 24.4203 36.6668 20 36.6668ZM28.3333 23.3335L20 15.0002L11.6667 23.3335H28.3333Z" fill="#36A74A"/>
                                </svg>
                                <p class="text-sm ml-2" style="color: var(--light-gray);">Pemasukan</p>
                            </div>
                            <h3 id="totalPemasukan" class="font-bold" style="color: var(--dark-text);">Rp. 402,500</h3>
                        </div>
                        <div class="col-span-3 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                            <div class="flex flex-row items-center mb-1">
                                <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 3.3335C22.1887 3.3335 24.356 3.76459 26.3781 4.60217C28.4002 5.43975 30.2375 6.66741 31.7852 8.21505C33.3328 9.76269 34.5605 11.6 35.398 13.6221C36.2356 15.6442 36.6667 17.8115 36.6667 20.0002C36.6667 24.4204 34.9108 28.6597 31.7852 31.7853C28.6595 34.9109 24.4203 36.6668 20 36.6668C17.8113 36.6668 15.6441 36.2357 13.622 35.3982C11.5999 34.5606 9.76257 33.3329 8.21493 31.7853C5.08932 28.6597 3.33337 24.4204 3.33337 20.0002C3.33337 15.5799 5.08932 11.3407 8.21493 8.21505C11.3405 5.08944 15.5798 3.3335 20 3.3335ZM11.6667 16.6668L20 25.0002L28.3334 16.6668H11.6667Z" fill="#DB1D1F"/>
                                </svg>
                                <p class="text-sm ml-2" style="color: var(--light-gray);">Pengeluaran</p>
                            </div>
                            <h3 id="totalPengeluaran" class="font-bold" style="color: var(--dark-text);">Rp. 89,000</h3>
                        </div>
                        <!-- Pemasukan Pengeluaran end-->
                    </div>
                </div>
                <!-- Transaksi-->
                <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                    <h3>List Transaksi</h3>
                    <hr class="my-5" style="color: var(--shaded-white);">
                    <h4 class="mb-2">Hari Ini</h4>
                    <h5 style="color: var(--tinted-gray)" class="mb-5">23 Desember 2025</h5>
                    <!-- Transaksi List -->
                    <a id="listTransaksi" href="<?= base_url('transaksi/detail-transaksi') ?>">
                        <div class="transaksi-home flex flex-row justify-between items-center border border-dark-white p-3.5 rounded-lg mb-3">
                            <div class="flex flex-col">
                                <p class="text-sm" style="color: var(--light-gray);">Bisnis</p>
                                <h4>Penjualan Makanan</h4>
                            </div>
                            <h4 style="color: var(--primary-500);">+Rp. 120,000</h4>
                        </div>
                    </a>
                    <!-- Transaksi List -->
                </div>
                <!-- Transaksi-->
                <!-- Kategori -->
                <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                    <h3>Kategori</h3>
                    <hr class="my-5" style="color: var(--shaded-white);">
                    <div>
                        <canvas id="kategoriChart"></canvas>
                    </div>
                </div>
                <!-- Kategori End -->
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tipeSelect = document.getElementById('tipeTransaksi');
            const kategoriSelect = document.getElementById('kategoriSelect');
            const kategoriOptions = kategoriSelect.querySelectorAll('option[data-type]');

            tipeSelect.addEventListener('change', function () {
                const selectedType = this.value;

                kategoriSelect.disabled = !selectedType;
                kategoriSelect.value = '-- Pilih Kategori --';

                kategoriOptions.forEach(option => {
                    option.style.display =
                        option.dataset.type === selectedType ? 'block' : 'none';
                });
            });
        });

        let currentMode  = 'daily';
        let currentValue = new Date().toISOString().slice(0, 10); // hari ini

        // Skeleton loading

        function showLoading() {
            document.getElementById('transaksi-loading').classList.remove('hidden');
            document.getElementById('transaksi-content').classList.add('hidden');
        }

        function hideLoading() {
            document.getElementById('transaksi-loading').classList.add('hidden');
            document.getElementById('transaksi-content').classList.remove('hidden');
        }

        function loadTransaksi() {
            showLoading();

            fetch(`/transaksi/data?mode=${currentMode}&value=${currentValue}`)
                .then(res => res.json())
                .then(data => {
                    console.log('DATA:', data);

                    renderSummary(data.summary);
                    renderList(data.list);
                    renderChart(data.chart);
                })
                .finally(() => {
                    hideLoading();
                });
        }

        document.addEventListener('DOMContentLoaded', loadTransaksi);

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }

        function renderSummary(summary) {
            const pemasukan  = summary?.total_pemasukan ?? 0;
            const pengeluaran = summary?.total_pengeluaran ?? 0;

            document.getElementById('totalPemasukan').innerText =
                formatRupiah(pemasukan);

            document.getElementById('totalPengeluaran').innerText =
                formatRupiah(pengeluaran);
        }

        // Tabs (Harian / Bulanan)

        const hariLabels = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
        const bulanLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];


        function renderTabs() {
            const tabs = document.getElementById('tabsContainer');
            tabs.innerHTML = '';
            

            if (currentMode === 'daily') {
                hariLabels.forEach((label, index) => {
                    const date = new Date();
                    date.setDate(date.getDate() - (date.getDay() - index));
                    const value = date.toISOString().slice(0, 10);

                    tabs.innerHTML += `
                        <a class="tab tab-sm"
                        data-value="${value}">
                        ${label}
                        </a>
                    `;
                });
            } else {
                bulanLabels.forEach((label, index) => {
                    const month = String(index + 1).padStart(2,'0');
                    const value = `${new Date().getFullYear()}-${month}`;

                    tabs.innerHTML += `
                        <a class="tab tab-sm"
                        data-value="${value}">
                        ${label}
                        </a>
                    `;
                });
            }

            attachTabEvents();
        }

        function attachTabEvents() {
            document.querySelectorAll('#tabsContainer .tab').forEach(tab => {
                tab.addEventListener('click', () => {
                    const value = tab.dataset.value;
                    currentValue = value;

                    setActiveTab(value);
                    loadTransaksi();
                });
            });
        }

        function setActiveTab(value) {
            document.querySelectorAll('#tabsContainer .tab').forEach(tab => {
                tab.classList.toggle(
                    'tab-active',
                    tab.dataset.value === value
                );
            });
        }

        document.getElementById('modeSelect').addEventListener('change', function () {
            currentMode = this.value;

            currentValue = currentMode === 'daily'
                ? new Date().toISOString().slice(0,10)
                : new Date().toISOString().slice(0,7);

            renderTabs();
            setActiveTab(currentValue);
            loadTransaksi();
        });


        document.addEventListener('DOMContentLoaded', function () {

            if (currentMode === 'daily') {
                currentValue = new Date().toISOString().slice(0,10); // hari ini
            } else {
                currentValue = new Date().toISOString().slice(0,7);  // bulan ini
            }

            renderTabs();
            setActiveTab(currentValue);
            loadTransaksi();
        });


        // Chart.js
        let kategoriChart = null;

        function initChart() {
            const ctx = document.getElementById('kategoriChart');
            if (!ctx) return;

            kategoriChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        backgroundColor: [
                            '#f87171',
                            '#fb923c',
                            '#facc15',
                            '#4ade80',
                            '#60a5fa',
                            '#818cf8',
                            '#a78bfa'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    cutout: '65%',
                    plugins: {
                        legend: { position: 'bottom' },
                        title: {
                            display: true,
                            text: 'Kategori Paling Banyak'
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true
                    }
                }
            });
        }

        function renderChart(chartData) {
            if (!kategoriChart) return;

            const labels = chartData.map(item => item.nama_kategori);
            const data   = chartData.map(item => item.total);

            kategoriChart.data.labels = labels;
            kategoriChart.data.datasets[0].data = data;

            kategoriChart.update();
        }

        function renderList(list) {
            const container = document.getElementById('listTransaksi');
            if (!container) return;

            container.innerHTML = '';

            if (!list || list.length === 0) {
                container.innerHTML = `
                    <p class="text-center text-gray-400 text-sm">
                        Tidak ada transaksi
                    </p>
                `;
                return;
            }

            list.forEach(trx => {
                console.log(trx);
                const sign  = trx.type === 'Pemasukan' ? '+' : '-';
                const color = trx.type === 'Pemasukan' ? 'text-primary-500' : 'text-danger-500';

                container.innerHTML += `
                    <div class="transaksi-home flex flex-row justify-between items-center border border-dark-white p-3.5 rounded-lg mb-3">
                        <div class="flex flex-col">
                            <p class="text-sm" style="color: var(--light-gray);">${trx.type}</p>
                            <h4>${trx.nama_kategori}</h4>
                        </div>
                        <h4 class="${color}">${sign} ${formatRupiah(trx.nominal)}</h4>
                    </div>
                `;
            });
        }

        function loadTransaksi() {
            showLoading();

            fetch(`/transaksi/data?mode=${currentMode}&value=${currentValue}`)
                .then(res => res.json())
                .then(data => {
                    renderSummary(data.summary);
                    renderList(data.list);
                    renderChart(data.chart); 
                })
                .finally(hideLoading);
        }

        document.addEventListener('DOMContentLoaded', function () {
            initChart();
            loadTransaksi();
        });

    </script>
<?= $this->endSection() ?>
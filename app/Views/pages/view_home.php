<?= $this->extend('layout/main/view_main') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <!-- Saldo -->
            <div class="col-span-12 sm:col-span-8 bg-primary-500 rounded-xl text-white p-8">
                <p class="text-sm mb-2">Saldo: IDR </p>
                <p class=" text-3xl md:text-5xl font-black">Rp. 5,436,788</p>
            </div>
            <!-- Saldo end -->
            <!-- Budget -->
            <div class="col-span-12 sm:col-span-4 bg-white rounded-xl border border-shaded-white px-6 py-4">
                <p class="text-sm" style="color: var(--light-gray);">Liburan</p>
                <h2>Rp. 10,000,000</h2>
                <progress class="progress text-primary-500 w-56" value="70" max="100"></progress>
                <p class="text-xs mt-2" style="color: var(--light-gray);">70% Complete</p>
            </div>
            <!-- Budget end-->
            <!-- Pemasukan Pengeluaran -->
            <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <p class="text-sm mb-2" style="color: var(--light-gray);">Pemasukan</p>
                <div class="flex flex-row items-center">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 36.6668C17.8113 36.6668 15.644 36.2357 13.622 35.3982C11.5999 34.5606 9.76254 33.3329 8.2149 31.7853C5.08929 28.6597 3.33334 24.4204 3.33334 20.0002C3.33334 15.5799 5.08929 11.3407 8.2149 8.21505C11.3405 5.08944 15.5797 3.3335 20 3.3335C22.1887 3.3335 24.356 3.76459 26.3781 4.60217C28.4002 5.43975 30.2375 6.66741 31.7851 8.21505C33.3328 9.76269 34.5604 11.6 35.398 13.6221C36.2356 15.6442 36.6667 17.8115 36.6667 20.0002C36.6667 24.4204 34.9107 28.6597 31.7851 31.7853C28.6595 34.9109 24.4203 36.6668 20 36.6668ZM28.3333 23.3335L20 15.0002L11.6667 23.3335H28.3333Z" fill="#36A74A"/>
                    </svg>
                    <h1 class="ml-2" style="color: var(--dark-text);">Rp. 8,501,001</h1>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <p class="text-sm mb-2" style="color: var(--light-gray);">Pengeluaran</p>
                <div class="flex flex-row items-center">
                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.3335C22.1887 3.3335 24.356 3.76459 26.3781 4.60217C28.4002 5.43975 30.2375 6.66741 31.7852 8.21505C33.3328 9.76269 34.5605 11.6 35.398 13.6221C36.2356 15.6442 36.6667 17.8115 36.6667 20.0002C36.6667 24.4204 34.9108 28.6597 31.7852 31.7853C28.6595 34.9109 24.4203 36.6668 20 36.6668C17.8113 36.6668 15.6441 36.2357 13.622 35.3982C11.5999 34.5606 9.76257 33.3329 8.21493 31.7853C5.08932 28.6597 3.33337 24.4204 3.33337 20.0002C3.33337 15.5799 5.08932 11.3407 8.21493 8.21505C11.3405 5.08944 15.5798 3.3335 20 3.3335ZM11.6667 16.6668L20 25.0002L28.3334 16.6668H11.6667Z" fill="#DB1D1F"/>
                    </svg>
                    <h1 class="ml-2" style="color: var(--dark-text);">Rp. 3,064,213</h1>
                </div>
            </div>
            <!-- Pemasukan Pengeluaran end-->
            <!-- Transaksi-->
            <div class="col-span-12 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <div class="flex flex-row justify-between">
                    <h3>Transaksi Terbaru</h3>
                    <a href="<?= base_url('/transaksi') ?>"
                        <p class="font-black" style="color: var(--primary-500);">Lainnya</p>
                    </a>
                </div>
                <hr class="my-5" style="color: var(--shaded-white);">
                <h4 class="mb-2">Hari Ini</h4>
                <h5 style="color: var(--tinted-gray)" class="mb-5">23 Desember 2025</h5>
                <!-- Transaksi List -->
                <div class="transaksi-home flex flex-row justify-between items-center border border-dark-white p-3.5 rounded-lg mb-3">
                    <div class="flex flex-col">
                        <p class="text-sm" style="color: var(--light-gray);">Bisnis</p>
                        <h3>Penjualan Makanan</h3>
                    </div>
                    <h3 style="color: var(--primary-500);">+Rp. 120,000</h3>
                </div>
                <div class="transaksi-home flex flex-row justify-between items-center border border-dark-white p-3.5 rounded-lg">
                    <div class="flex flex-col">
                        <p class="text-sm" style="color: var(--light-gray);">Kendaraan</p>
                        <h3>Ganti oli</h3>
                    </div>
                    <h3 style="color: var(--danger-500);">-Rp. 50,000</h3>
                </div>
                <!-- Transaksi List -->
            </div>
            <!-- Transaksi-->
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
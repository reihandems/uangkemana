<?= $this->extend('layout/main/view_transaksi_detail') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 sm:col-span-8 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <div class="flex flex-row items-center mb-1">
                    <h3 class="font-bold mr-2">Penjualan Makanan</h3>
                    <div class="badge bg-primary-200 text-dark-text p-4">Pemasukan</div>
                </div>
                <p class="text-light-gray">Bisnis</p>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-col text-center">
                    <p>Nominal</p>
                    <h1 class="text-primary-500 font-bold">+Rp. 120,000</h1>
                </div>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Kategori</p>
                    <p>Bisnis</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Tipe</p>
                    <p>Pemasukan</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Tanggal</p>
                    <p>23 Desember 2024</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Jam</p>
                    <p>21:52</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Catatan</p>
                    <p>-</p>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <h3>Aksi Cepat</h3>
                <hr class="text-shaded-white my-5">
                <a href="#">
                    <button class="btn w-full mb-3">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.71 7.03957C21.1 6.64957 21.1 5.99957 20.71 5.62957L18.37 3.28957C18 2.89957 17.35 2.89957 16.96 3.28957L15.12 5.11957L18.87 8.86957M3 17.2496V20.9996H6.75L17.81 9.92957L14.06 6.17957L3 17.2496Z" fill="black"/>
                    </svg>
                    Edit
                    </button>
                </a>
                <a href="#">
                    <button class="btn bg-white border border-danger-500 text-danger-500 w-full">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 4H15.5L14.5 3H9.5L8.5 4H5V6H19M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19Z" fill="#FF3728"/>
                    </svg>
                    Hapus
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
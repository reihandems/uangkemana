<?= $this->extend('layout/main/view_main_budget_detail') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 sm:col-span-8 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <div class="flex flex-row items-center mb-1">
                    <h3 class="font-bold mr-2">Uang Kuliah Adhe</h3>
                </div>
                <p class="text-light-gray">Pendidikan</p>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-col">
                    <p>Dana Yang Dibutuhkan</p>
                    <h1 class="font-bold text-primary-500">Rp. 350,000,000</h1>
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
            <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <div class="flex flex-row items-center mb-1">
                    <h3 class="font-bold mr-2">Progress Dana</h3>
                </div>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-row items-center justify-between">
                    <p class="text-light-gray text-sm">Total Dana Tersimpan</p>
                    <p class="text-light-gray text-sm"><span class="text-primary-500">Rp. 250jt</span>/ Rp. 350jt</p>
                </div>
                <progress class="progress text-primary-500 w-full my-4" value="70" max="100"></progress>
                <div class="flex flex-row items-start border border-dark-white py-4 px-4 rounded-xl">
                    <svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.25 11.25H13.75V8.75H16.25M16.25 21.25H13.75V13.75H16.25M15 2.5C13.3585 2.5 11.733 2.82332 10.2165 3.45151C8.69989 4.07969 7.3219 5.00043 6.16117 6.16117C3.81696 8.50537 2.5 11.6848 2.5 15C2.5 18.3152 3.81696 21.4946 6.16117 23.8388C7.3219 24.9996 8.69989 25.9203 10.2165 26.5485C11.733 27.1767 13.3585 27.5 15 27.5C18.3152 27.5 21.4946 26.183 23.8388 23.8388C26.183 21.4946 27.5 18.3152 27.5 15C27.5 13.3585 27.1767 11.733 26.5485 10.2165C25.9203 8.69989 24.9996 7.3219 23.8388 6.16117C22.6781 5.00043 21.3001 4.07969 19.7835 3.45151C18.267 2.82332 16.6415 2.5 15 2.5Z" fill="#888888"/>
                    </svg>
                    <p class="text-xs font-semibold ml-2 text-tinted-gray">Tetap Semangat! Kamu masih butuh <span class="font-bold text-primary-500">Rp.100,000,000</span> lagi untuk mencapai tujuan</p>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <h3 class="font-bold mr-2">Detail Lainnya</h3>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray text-sm">Kategori</p>
                    <p class="text-sm">Bisnis</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray text-sm">Dana Terkumpul</p>
                    <p class="text-sm">Rp.250,000,000</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray text-sm">Target</p>
                    <p class="text-sm">11 Januari 2024</p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray text-sm">Sisa Waktu</p>
                    <p class="text-sm">4 Bulan</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
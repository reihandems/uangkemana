<?= $this->extend('layout/main/view_main_budget') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 bg-primary-100 rounded-xl py-4 md:py-0 px-20">
                <div class="flex flex-col md:flex-row items-center justify-between ">
                    <img src="<?= base_url('assets/img/green-pig.svg') ?>" alt="" class="w-40">
                    <h2 class="text-primary-800 font-bold text-center mb-3 md:mb-0">Visualisasikan Finansial Anda</h2>
                    <div class="badge bg-[#FEE355] text-primary-800 border border-[#FEE355] font-black rounded-xl p-6">Mulai Sekarang</div>
                </div>
            </div>
            <div class="col-span-12 bg-white rounded-xl py-10 px-32">
                <div class="flex flex-col text-center items-center">
                    <img src="<?= base_url('assets/img/piggy-empty.svg') ?>" alt="" class="w-40 mb-5">
                    <p class="text-sm mb-3 text-dark-text">Saat ini anda tidak memiliki budget</p>
                    <div class="flex flex-row items-center">
                        <svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.25 11.25H13.75V8.75H16.25M16.25 21.25H13.75V13.75H16.25M15 2.5C13.3585 2.5 11.733 2.82332 10.2165 3.45151C8.69989 4.07969 7.3219 5.00043 6.16117 6.16117C3.81696 8.50537 2.5 11.6848 2.5 15C2.5 18.3152 3.81696 21.4946 6.16117 23.8388C7.3219 24.9996 8.69989 25.9203 10.2165 26.5485C11.733 27.1767 13.3585 27.5 15 27.5C18.3152 27.5 21.4946 26.183 23.8388 23.8388C26.183 21.4946 27.5 18.3152 27.5 15C27.5 13.3585 27.1767 11.733 26.5485 10.2165C25.9203 8.69989 24.9996 7.3219 23.8388 6.16117C22.6781 5.00043 21.3001 4.07969 19.7835 3.45151C18.267 2.82332 16.6415 2.5 15 2.5Z" fill="#CCCCCC"/>
                        </svg>  
                        <p class="text-sm ml-1 text-medium-gray">Coba klik tombol diatas untuk membuat budget baru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    
<?= $this->endSection() ?>
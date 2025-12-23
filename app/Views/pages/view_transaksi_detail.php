<?= $this->extend('layout/main/view_transaksi_detail') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <p class="text-sm text-pale-gray">Total </p>
                <p class="text-3xl text-primary-500 font-black">Rp. 313,500</p>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
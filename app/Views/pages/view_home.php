<?= $this->extend('layout/main/view_main') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold mt-8">
        <h5 style="color: var(--secondary-text); margin-bottom: 18px;">Ringkasan</h5>
        <!-- Informasi -->
        <div class="grid grid-rows-1 grid-cols-12 text-center gap-5">
            <div class="col-span-12 sm:col-span-4 bg-base-100 rounded-md" style="padding: 20px; border: 1px solid var(--secondary-stroke);">
                <p class="text-xs" style="color: var(--secondary-text);">Total Barang</p>
                <h1>173</h1>
            </div>
            <div class="col-span-12 sm:col-span-4 bg-base-100 rounded-md" style="padding: 20px; border: 1px solid var(--secondary-stroke);">
                <p class="text-xs" style="color: var(--secondary-text);">Total Supplier</p>
                <h1>3</h1>
            </div>
            <div class="col-span-12 sm:col-span-4 bg-base-100 rounded-md" style="padding: 20px; border: 1px solid var(--secondary-stroke);">
                <p class="text-xs" style="color: var(--secondary-text);">Total User</p>
                <h1>50</h1>
            </div>
        </div>
        <!-- Informasi end -->
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
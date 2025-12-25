<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets/css/output.css') ?>" rel="stylesheet">
    <link href="<?= base_url('resources/css/custom.css') ?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="grid grid-cols-12 min-h-screen">
        <!-- Sidebar -->
        <div class="col-span-12 md:col-span-3">
            <?= $this->include('layout/sidebar', ['menu' => $menu]) ?>
        </div>
        <!-- Sidebar end -->
        <!-- Kanan -->
        <div class=" col-span-12 md:col-span-9 min-h-screen">
            <div class="bg-[#ffffff]">
                <?= $this->include('layout/header') ?>
            </div>
            <?= $this->renderSection('content') ?>
        </div>
        <!-- Kanan end -->
    </div>
    <dialog id="modal_transaksi" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <p class="font-bold text-xl md:text-2xl">Transaksi Baru</p>
            <hr class="text-shaded-white my-5">
            <!-- Form -->
            <form action="">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Dompet</legend>
                            <select class="select w-full">
                                <option disabled selected>-- Pilih Dompet --</option>
                                <option>Chrome</option>
                                <option>FireFox</option>
                                <option>Safari</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Tipe</legend>
                            <select class="select w-full">
                                <option disabled selected>-- Pilih Tipe Transaksi --</option>
                                <option>Chrome</option>
                                <option>FireFox</option>
                                <option>Safari</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nama Kategori</legend>
                            <select class="select w-full">
                                <option disabled selected>-- Pilih Kategori --</option>
                                <option>Chrome</option>
                                <option>FireFox</option>
                                <option>Safari</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Tanggal</legend>
                            <input type="date" class="input" />
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Jam</legend>
                            <input type="time" class="input" />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nominal</legend>
                            <input type="number" class="input w-full" placeholder="Masukkan Nominal Transaksi" />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Catatan (Optional)</legend>
                            <input type="text" class="input w-full" placeholder="Catatan Transaksi" />
                        </fieldset>
                    </div>
                </div>
            </form>
            <!-- Form end -->
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
            </div>
        </div>
    </dialog>
    <dialog id="modal_dompet" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <p class="font-bold text-xl md:text-2xl">Tambah Dompet</p>
            <hr class="text-shaded-white my-5">
            <!-- Form -->
            <form action="">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nama Dompet</legend>
                            <input type="text" class="input w-full" placeholder="Masukkan Nama Dompet" />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Mata Uang</legend>
                            <select class="select w-full" disabled>
                                <option selected>Indonesian Rupiah (IDR)</option>
                                <option>FireFox</option>
                                <option>Safari</option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Saldo</legend>
                            <input type="number" class="input w-full" placeholder="Masukkan Saldo" />
                        </fieldset>
                    </div>
                </div>
            </form>
            <!-- Form end -->
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
            </form>
            </div>
        </div>
    </dialog>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
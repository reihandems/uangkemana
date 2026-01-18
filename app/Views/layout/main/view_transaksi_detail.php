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
                <?= $this->include('layout/header_transaksi') ?>
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
            <form id="transaksiForm" class="form-transaksi" action="<?= base_url('/user/transaksi/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Dompet</legend>
                            <select class="select w-full" name="dompet_id" required>
                                <option disabled selected>-- Pilih Dompet --</option>
                                <?php foreach ($dompet as $d): ?>
                                    <option value="<?= $d['dompet_id'] ?>">
                                        <?= esc($d['nama_dompet']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Tipe</legend>
                            <select class="select w-full tipe-transaksi" name="type">
                                <option disabled selected>-- Pilih Tipe Transaksi --</option>
                                <option value="Pemasukan">
                                    <div class="badge badge-success badge-xs"></div>
                                    Pemasukan
                                </option>
                                <option value="Pengeluaran">
                                    <div class="badge badge-error badge-xs"></div>
                                    Pengeluaran
                                </option>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nama Kategori</legend>
                            <select class="select w-full kategori-transaksi" name="kategori_id" disabled required>
                                <option disabled selected>-- Pilih Kategori --</option>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['kategori_id'] ?>" data-type="<?= $k['type'] ?>">
                                        <?= esc($k['nama_kategori']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Tanggal</legend>
                            <input type="date" class="input" name="tanggal" />
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Jam</legend>
                            <input type="time" class="input" name="jam" />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nominal</legend>
                            <input type="number" id="nominal" name="nominal" class="input w-full" placeholder="Masukkan Nominal Transaksi" />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Catatan (Optional)</legend>
                            <input type="text" class="input w-full" name="note" id="note" placeholder="Catatan Transaksi" />
                        </fieldset>
                    </div>
                </div>
            </form>
            <!-- Form end -->
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
                <button type="submit" class="btn bg-primary-500 text-white" form="transaksiForm">Tambah</button>
            </form>
            </div>
        </div>
    </dialog>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
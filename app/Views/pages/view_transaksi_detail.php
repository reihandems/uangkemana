<?= $this->extend('layout/main/view_transaksi_detail') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <!-- Form Edit -->
        <dialog id="modal_transaksi_edit" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <p class="font-bold text-xl md:text-2xl">Edit Transaksi</p>
                <hr class="text-shaded-white my-5">
                <!-- Form -->
                <form id="transaksiEditForm" class="form-transaksi" action="<?= base_url('/user/transaksi/update/'.$transaksi['transaksi_id']) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-12">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Dompet</legend>
                                <select class="select w-full" name="dompet_id" required>
                                    <option disabled selected>-- Pilih Dompet --</option>
                                    <?php foreach ($dompet as $d): ?>
                                        <option value="<?= $d['dompet_id'] ?>" <?= $d['dompet_id'] == $transaksi['dompet_id'] ? 'selected' : '' ?>>
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
                                    <option value="Pemasukan" <?= $transaksi['type']=='Pemasukan'?'selected':'' ?>>Pemasukan</option>
                                    <option value="Pengeluaran" <?= $transaksi['type']=='Pengeluaran'?'selected':'' ?>>Pengeluaran</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-span-6">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Nama Kategori</legend>
                                <select class="select w-full kategori-transaksi" name="kategori_id" required>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['kategori_id'] ?>" data-type="<?= $k['type'] ?>" <?= $k['kategori_id'] == $transaksi['kategori_id'] ? 'selected' : '' ?> >
                                            <?= esc($k['nama_kategori']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-span-6">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Tanggal</legend>
                                <input type="date" class="input" name="tanggal" value="<?= date('Y-m-d', strtotime($transaksi['transaction_at'])) ?>" />
                            </fieldset>
                        </div>
                        <div class="col-span-6">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Jam</legend>
                                <input type="time" class="input" name="jam" value="<?= date('H:i', strtotime($transaksi['transaction_at'])) ?>" />
                            </fieldset>
                        </div>
                        <div class="col-span-12">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Nominal</legend>
                                <input type="number" id="nominal" name="nominal" class="input w-full" value="<?= $transaksi['nominal'] ?>" />
                            </fieldset>
                        </div>
                        <div class="col-span-12">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Catatan (Optional)</legend>
                                <input type="text" class="input w-full" name="note" id="note" value="<?= $transaksi['note'] ?>" />
                            </fieldset>
                        </div>
                    </div>
                </form>
                <!-- Form end -->
                <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                    <button type="submit" class="btn bg-primary-500 text-white" form="transaksiEditForm">Update</button>
                </form>
                </div>
            </div>
        </dialog>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 sm:col-span-8 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <div class="flex flex-row items-center mb-1">
                    <h3 class="font-bold mr-2"><?= esc($transaksi['nama_kategori']) ?></h3>
                    <div>
                        <?= formatBadge($transaksi['type']) ?>
                    </div>
                </div>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-col text-center">
                    <p>Nominal</p>
                    <h1>
                        <?= formatNominal(esc($transaksi['nominal']), esc($transaksi['type'])) ?>
                    </h1>
                </div>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Kategori</p>
                    <p><?= esc($transaksi['nama_kategori']) ?></p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Tipe</p>
                    <p><?= esc($transaksi['type']) ?></p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Tanggal</p>
                    <p><?= esc(tanggalIndo($transaksi['transaction_at'])) ?></p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Jam</p>
                    <p><?= esc(formatJam($transaksi['transaction_at'])) ?></p>
                </div>
                <div class="flex flex-row justify-between mb-4">
                    <p class="text-tinted-gray">Catatan</p>
                    <p><?= esc($transaksi['note']) ?></p>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-4 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <h3>Aksi Cepat</h3>
                <hr class="text-shaded-white my-5">
                <button class="btn w-full mb-3" onclick="modal_transaksi_edit.showModal()">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.71 7.03957C21.1 6.64957 21.1 5.99957 20.71 5.62957L18.37 3.28957C18 2.89957 17.35 2.89957 16.96 3.28957L15.12 5.11957L18.87 8.86957M3 17.2496V20.9996H6.75L17.81 9.92957L14.06 6.17957L3 17.2496Z" fill="black"/>
                    </svg>
                    Edit
                </button>
                <a href="<?= base_url('/user/transaksi/delete/'.$transaksi['transaksi_id']) ?>" class="btn bg-white border border-danger-500 text-danger-500 w-full">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 4H15.5L14.5 3H9.5L8.5 4H5V6H19M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19Z" fill="#FF3728"/>
                    </svg>
                    Hapus
                </a>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        document.addEventListener('change', function (e) {

            if (!e.target.classList.contains('tipe-transaksi')) return;

            const form = e.target.closest('.form-transaksi');
            if (!form) return;

            const kategoriSelect = form.querySelector('.kategori-transaksi');
            if (!kategoriSelect) return;

            let hasOption = false;

            Array.from(kategoriSelect.options).forEach(opt => {
                if (!opt.dataset.type) return;

                if (opt.dataset.type === e.target.value) {
                    opt.hidden = false;
                    hasOption = true;
                } else {
                    opt.hidden = true;
                }
            });

            kategoriSelect.disabled = !hasOption;
            kategoriSelect.value = '';
        });
    </script>

<?= $this->endSection() ?>
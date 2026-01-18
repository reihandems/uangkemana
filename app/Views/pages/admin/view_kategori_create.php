<?= $this->extend('layout/main/view_main_admin') ?>
<?= $this->section('content') ?>
<div class="grid grid-cols-12 gap-6 p-8">
    <div class="col-span-12">
        <fieldset class="fieldset bg-white border-base-300 rounded-box w-full border py-4 px-8">
            <legend class="fieldset-legend">Form Tambah Kategori</legend>
            <form action="<?= base_url('/admin/data-kategori/store') ?>" method="post">
                <div class="grid grid-cols-12 gap-x-4 gap-y-4">
                    <div class="col-span-6">
                        <legend class="fieldset-legend">Nama Kategori</legend>
                        <input type="text" class="input w-full" name="nama_kategori" placeholder="Masukkan nama kategori" required />
                    </div>
                    <div class="col-span-6">
                        <legend class="fieldset-legend">Tipe</legend>
                        <select class="select w-full" name="type">
                            <option disabled selected>-- Pilih Tipe Kategori --</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <div class="col-span-12">
                        <button type="submit" class="btn bg-primary-500 text-white w-full">Tambah Kategori</button>
                    </div>
                    <div class="col-span-12">
                        <a href="<?= base_url('/admin/data-customer') ?>" class="btn btn-ghost w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 0 1 0 1.06l-6.22 6.22H21a.75.75 0 0 1 0 1.5H4.81l6.22 6.22a.75.75 0 1 1-1.06 1.06l-7.5-7.5a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd" />
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('layout/main/view_main_admin') ?>
<?= $this->section('content') ?>
<div class="grid grid-cols-12 gap-6 p-8">
    <div class="col-span-12">
        <div class="flex flex-row items-center justify-between mb-5">
            <a href="<?= base_url('admin/data-kategori/create') ?>" class="btn bg-primary-500 text-white">+ Tambah Kategori</a>
            <form action="" method="get" class="flex gap-2">
                <label class="input">
                    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <g
                            stroke-linejoin="round"
                            stroke-linecap="round"
                            stroke-width="2.5"
                            fill="none"
                            stroke="currentColor">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.3-4.3"></path>
                        </g>
                    </svg>
                    <input type="search" name="keyword" value="<?= esc($keyword) ?>" placeholder="Cari kategori..." />
                </label>
                <button type="submit" class="btn bg-white text-primary-500">Cari</button>
                <?php if ($keyword): ?>
                    <a href="<?= base_url('admin/data-kategori') ?>" class="btn">Reset</a>
                <?php endif; ?>
            </form>
        </div>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success text-white w-full mb-3"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error w-full mb-3"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (empty($kategori)) : ?>
            <div class="alert alert-warning alert-outline mb-5 w-full">Belum ada data kategori</div>
        <?php elseif (!empty($kategori)) : ?>
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-primary-100">
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $page = request()->getVar('page_kategori') ?? 1;
                        $no = 1 + (10 * ($page - 1));

                        foreach ($kategori as $k) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= esc($k['nama_kategori']) ?></td>
                                <td><?= esc($k['type']) ?></td>
                                <td>
                                    <a href="<?= base_url('/admin/data-kategori/edit/' . $k['kategori_id']) ?>" class="btn btn-sm bg-primary-500 text-white">Edit</a>
                                    <a href="<?= base_url('/admin/data-kategori/delete/' . $k['kategori_id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-outline btn-error text-red-500">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-center">
                <?= $pager->links('kategori', 'daisyui') ?>
            </div>
        <?php endif; ?>

    </div>
</div>
<?= $this->endSection(); ?>
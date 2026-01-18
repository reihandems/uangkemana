<?= $this->extend('layout/main/view_main_admin') ?>
<?= $this->section('content') ?>
<div class="grid grid-cols-12 gap-6 p-8">
    <div class="col-span-12">
        <div class="flex justify-end mb-5">
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
                    <input type="search" name="keyword" value="<?= esc($keyword) ?>" placeholder="Cari user..." />
                </label>
                <button type="submit" class="btn bg-white text-primary-500">Cari</button>
                <?php if ($keyword): ?>
                    <a href="<?= base_url('admin/data-user') ?>" class="btn">Reset</a>
                <?php endif; ?>
            </form>
        </div>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-outline w-full mb-3"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-error alert-outline w-full mb-3"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (empty($users)) : ?>
            <div class="alert alert-warning alert-outline mb-5 w-full">Belum ada data user</div>
        <?php elseif (!empty($users)) : ?>
            <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr class="bg-primary-100">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bergabung Sejak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $page = request()->getVar('page_user') ?? 1;
                        $no = 1 + (10 * ($page - 1));

                        foreach ($users as $u) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= esc($u['name']) ?></td>
                                <td><?= esc($u['email']) ?></td>
                                <td>
                                    <?php

                                    date_default_timezone_set('UTC');

                                    $dateString = $u['created_at'];
                                    $timestamp = strtotime($dateString);

                                    echo esc(date("j F Y h:i:s", $timestamp))

                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('/admin/data-user/delete/' . $u['user_id']) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-outline btn-error text-red-500">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 flex justify-center">
                <?= $pager->links('users', 'daisyui') ?>
            </div>
        <?php endif; ?>

    </div>
</div>
<?= $this->endSection(); ?>
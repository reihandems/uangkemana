<?= $this->extend('layout/main/view_main') ?>
<?= $this->section('content') ?>
<!-- Main Content -->
<div class="ringkasan font-semibold p-8">
    <div id="page-loading" class="space-y-4 hidden">
        <div class="skeleton h-48 w-full"></div>
    </div>
    <div id="page-content">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="toast toast-top toast-center">
                <div class="alert alert-success alert-soft border-shaded-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4" />
                    </svg>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="toast toast-top toast-center">
                <div class="alert alert-danger alert-soft border-shaded-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4" />
                    </svg>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            </div>
        <?php endif; ?>
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <h3 class="text-black">Profil Pribadi</h3>
                <hr class="text-shaded-white my-5">
                <form action="<?= base_url('/user/settings/update/' . $user['user_id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-12 md:col-span-6">
                            <div class="flex flex-col">
                                <div class="flex flex-row items-center mb-2">
                                    <div class="avatar">
                                        <div class="w-24 rounded-full">
                                            <?php if (empty($user['gambar'])) : ?>
                                                <img src="https://ui-avatars.com/api/?name=<?= session()->get('user_nama') ?>background=random" />
                                            <?php elseif (!empty($user['gambar'])) : ?>
                                                <img src="<?= base_url('uploads/profile/' . $user['gambar']) ?>" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <input type="file" name="gambar" class="file-input file-input-ghost ml-3" accept="image/*" />
                                </div>
                                <p class="text-xs text-tinted-gray mt-1">JPG / PNG • Max 2MB</p>
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <fieldset class="fieldset">
                                <legend class="fieldset-legend">Nama Lengkap</legend>
                                <input type="text" name="name" class="input w-full" value="<?= old('name', $user['name']) ?>" />
                            </fieldset>
                        </div>
                    </div>
                    <hr class="text-shaded-white my-5">
                    <button type="submit" class="btn bg-primary-500 text-white w-full">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Main Content end -->
<?= $this->endSection() ?>
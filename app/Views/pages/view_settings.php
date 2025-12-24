<?= $this->extend('layout/main/view_main') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <h3 class="text-black">Profil Pribadi</h3>
                <hr class="text-shaded-white my-5">
                <div class="flex flex-row items-center mb-5">
                    <div class="avatar">
                        <div class="w-24 rounded-full">
                            <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" />
                        </div>
                    </div>
                    <input type="file" class="file-input file-input-ghost ml-3" />
                </div>
                <div class="grid grid-cols-12 gap-5 mb-5">
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nama Lengkap</legend>
                            <input type="text" class="input w-full" placeholder="Type here" />
                        </fieldset>
                    </div>
                    <div class="col-span-6">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Email</legend>
                            <input type="text" class="input w-full" placeholder="Type here" />
                        </fieldset>
                    </div>
                </div>
                <button class="btn bg-primary-400 text-white w-full">Simpan</button>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
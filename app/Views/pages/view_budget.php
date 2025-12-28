<?= $this->extend('layout/main/view_main_budget') ?>
<?= $this->section('content') ?>
    <!-- Modal Budget -->
    <dialog id="modal_budget" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <p class="font-bold text-xl md:text-2xl">Tambah Budget</p>
            <hr class="text-shaded-white my-5">
            <!-- Form -->
            <form id="budgetForm" action="<?= base_url('/budget/store') ?>" method="post">
                <?= csrf_field() ?>
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Kategori</legend>
                            <select name="kategori_id" class="select w-full" required>
                                <?php foreach ($kategori as $k): ?>
                                    <?php if ($k['type'] === 'Pengeluaran'): ?>
                                        <option value="<?= $k['kategori_id'] ?>">
                                            <?= esc($k['nama_kategori']) ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Limit Nominal</legend>
                            <input type="number" class="input w-full" name="limit_amount" placeholder="Masukkan limit budget" />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Bulan</legend>
                            <input type="month" class="input w-full" name="bulan" id="" value="<?= date('Y-m') ?>" required>
                        </fieldset>
                    </div>
                </div>
            </form>
            <!-- Form end -->
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
                <button type="submit" class="btn bg-primary-500 text-white" form="budgetForm">Tambah</button>
            </form>
            </div>
        </div>
    </dialog>
    <!-- Modal Budget end -->
    <!-- Modal Budget Edit -->
    <dialog id="modal_edit_budget" class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <p class="font-bold text-xl md:text-2xl">Edit Budget</p>
            <hr class="text-shaded-white my-5">
            <!-- Form -->
            <form id="editBudgetForm" action="<?= base_url('/budget/update') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="budget_id" id="edit_budget_id">
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Kategori</legend>
                            <select name="kategori_id" id="edit_kategori_id" class="select w-full" required>
                                <?php foreach ($kategori as $k): ?>
                                    <?php if ($k['type'] === 'Pengeluaran'): ?>
                                        <option value="<?= $k['kategori_id'] ?>">
                                            <?= esc($k['nama_kategori']) ?>
                                        </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Limit Nominal</legend>
                            <input type="number" class="input w-full" name="limit_amount" id="edit_limit_amount" placeholder="Masukkan limit budget" required />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Bulan</legend>
                            <input type="month" class="input w-full" name="bulan" id="edit_bulan" value="<?= date('Y-m') ?>" required>
                        </fieldset>
                    </div>
                </div>
            </form>
            <!-- Form end -->
            <div class="modal-action">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
                <button type="submit" class="btn bg-primary-500 text-white" form="editBudgetForm">Update</button>
            </form>
            </div>
        </div>
    </dialog>
    <!-- Modal Budget Edit end -->
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div id="page-loading" class="space-y-4 hidden">
            <div class="skeleton h-24 w-full"></div>
            <div class="skeleton h-32 w-full"></div>
        </div>
        <div id="page-content">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="toast toast-top toast-center">
                    <div class="alert alert-success alert-soft border-shaded-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4"/>
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
                                d="M9 12l2 2 4-4"/>
                        </svg>
                        <span><?= session()->getFlashdata('error') ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <div class="grid grid-cols-12 gap-5">
                <div class="col-span-12 bg-primary-100 rounded-xl py-4 md:py-0 px-20">
                    <div class="flex flex-col md:flex-row items-center justify-between ">
                        <img src="<?= base_url('assets/img/green-pig.svg') ?>" alt="" class="w-40">
                        <h2 class="text-primary-800 font-bold text-center mb-3 md:mb-0">Visualisasikan Finansial Anda</h2>
                        <div class="badge bg-[#FEE355] text-primary-800 border border-[#FEE355] font-black rounded-xl p-6">Mulai Sekarang</div>
                    </div>
                </div>
                <?php if (empty($budgets)) : ?>
                    <div class="col-span-12 bg-white rounded-xl py-10 px-32">
                        <div class="flex flex-col text-center items-center">
                            <img src="<?= base_url('assets/img/piggy-empty.svg') ?>" alt="" class="w-40 mb-5">
                            <p class="text-sm mb-3 text-dark-text">Saat ini anda tidak memiliki budget</p>
                            <div class="flex flex-row items-center">
                                <svg width="20" height="20" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.25 11.25H13.75V8.75H16.25M16.25 21.25H13.75V13.75H16.25M15 2.5C13.3585 2.5 11.733 2.82332 10.2165 3.45151C8.69989 4.07969 7.3219 5.00043 6.16117 6.16117C3.81696 8.50537 2.5 11.6848 2.5 15C2.5 18.3152 3.81696 21.4946 6.16117 23.8388C7.3219 24.9996 8.69989 25.9203 10.2165 26.5485C11.733 27.1767 13.3585 27.5 15 27.5C18.3152 27.5 21.4946 26.183 23.8388 23.8388C26.183 21.4946 27.5 18.3152 27.5 15C27.5 13.3585 27.1767 11.733 26.5485 10.2165C25.9203 8.69989 24.9996 7.3219 23.8388 6.16117C22.6781 5.00043 21.3001 4.07969 19.7835 3.45151C18.267 2.82332 16.6415 2.5 15 2.5Z" fill="#CCCCCC"/>
                                </svg>  
                                <p class="text-sm ml-1 text-medium-gray">Coba klik tombol diatas untuk membuat budget baru</p>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php foreach ($budgets as $b) : ?>
                        <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                            <div class="flex flex-row items-center justify-between">
                                <?php
                                    $color = match($b['status']) {
                                        'aman'   => 'text-primary-500',
                                        'hampir' => 'progress-warning',
                                        'over'   => 'progress-error',
                                    };
                                ?>
                                <div class="flex flex-col">
                                    <p class="mt-2 text-2xl"><?= esc($b['nama_kategori']) ?></p>
                                    <p class="text-sm mt-3"><?= rupiah($b['total_pengeluaran']) ?> / <?= rupiah($b['limit_amount']) ?></p>
                                    <progress class="progress <?= $color ?> w-72 mt-3" value="<?= $b['progress'] ?>" max="100"></progress>
                                    <p class="text-xs mt-2" style="color: var(--light-gray);"><span class="<?= $color ?>">(<?= ucfirst($b['status']) ?>)</span> Progress <?= $b['progress'] ?>%</p>
                                </div>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="btn bg-white m-1">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 16C12.5304 16 13.0391 16.2107 13.4142 16.5858C13.7893 16.9609 14 17.4696 14 18C14 18.5304 13.7893 19.0391 13.4142 19.4142C13.0391 19.7893 12.5304 20 12 20C11.4696 20 10.9609 19.7893 10.5858 19.4142C10.2107 19.0391 10 18.5304 10 18C10 17.4696 10.2107 16.9609 10.5858 16.5858C10.9609 16.2107 11.4696 16 12 16ZM12 10C12.5304 10 13.0391 10.2107 13.4142 10.5858C13.7893 10.9609 14 11.4696 14 12C14 12.5304 13.7893 13.0391 13.4142 13.4142C13.0391 13.7893 12.5304 14 12 14C11.4696 14 10.9609 13.7893 10.5858 13.4142C10.2107 13.0391 10 12.5304 10 12C10 11.4696 10.2107 10.9609 10.5858 10.5858C10.9609 10.2107 11.4696 10 12 10ZM12 4C12.5304 4 13.0391 4.21071 13.4142 4.58579C13.7893 4.96086 14 5.46957 14 6C14 6.53043 13.7893 7.03914 13.4142 7.41421C13.0391 7.78929 12.5304 8 12 8C11.4696 8 10.9609 7.78929 10.5858 7.41421C10.2107 7.03914 10 6.53043 10 6C10 5.46957 10.2107 4.96086 10.5858 4.58579C10.9609 4.21071 11.4696 4 12 4Z" fill="black"/>
                                        </svg>
                                    </div>
                                    <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                        <li>
                                            <a onclick="openEditBudget(<?= $b['budget_id'] ?>,
                                                                    <?= $b['kategori_id'] ?>,
                                                                    <?= $b['limit_amount'] ?>)">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.71 7.03957C21.1 6.64957 21.1 5.99957 20.71 5.62957L18.37 3.28957C18 2.89957 17.35 2.89957 16.96 3.28957L15.12 5.11957L18.87 8.86957M3 17.2496V20.9996H6.75L17.81 9.92957L14.06 6.17957L3 17.2496Z" fill="black"/>
                                                </svg>
                                                Edit
                                            </a>
                                        </li>
                                        <li>
                                            <a class="text-danger-500" onclick="confirmDeleteBudget(<?= $b['budget_id'] ?>)">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19 4H15.5L14.5 3H9.5L8.5 4H5V6H19M6 19C6 19.5304 6.21071 20.0391 6.58579 20.4142C6.96086 20.7893 7.46957 21 8 21H16C16.5304 21 17.0391 20.7893 17.4142 20.4142C17.7893 20.0391 18 19.5304 18 19V7H6V19Z" fill="#FF3728"/>
                                                </svg>
                                                Hapus
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <a href="#" class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border-3 border-dashed border-primary-500" onclick="modal_budget.showModal()">
                        <div class="flex items-center h-full justify-center">
                            <p class="text-lg md:text-xl text-primary-500">+ Tambah Budget Baru</p>
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tipeSelect = document.getElementById('tipeTransaksi');
        const kategoriSelect = document.getElementById('kategoriSelect');
        const kategoriOptions = kategoriSelect.querySelectorAll('option[data-type]');

        tipeSelect.addEventListener('change', function () {
            const selectedType = this.value;

            kategoriSelect.disabled = !selectedType;
            kategoriSelect.value = '-- Pilih Kategori --';

            kategoriOptions.forEach(option => {
                option.style.display =
                    option.dataset.type === selectedType ? 'block' : 'none';
            });
        });
    });

    function openEditBudget(id, kategoriId, limit) {

        document.getElementById('edit_budget_id').value = id;
        document.getElementById('edit_kategori_id').value = kategoriId;
        document.getElementById('edit_limit_amount').value = limit;

        document.getElementById('editBudgetForm').action =
            `<?= base_url('/budget/update') ?>/${id}`;

        modal_edit_budget.showModal();
    }

    function confirmDeleteBudget(id) {
        if (!confirm('Yakin ingin menghapus budget ini?')) return;

        window.location.href =
            `<?= base_url('/budget/delete') ?>/${id}`;
    }

    setTimeout(() => {
            const alert = document.querySelector('.alert-success');
            if (alert) alert.remove();
    }, 3000);
    </script>
<?= $this->endSection() ?>
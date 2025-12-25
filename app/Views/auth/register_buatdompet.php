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
        <div class="col-span-12 md:col-span-6 pl-12 pr-12 md:pr-40 py-8 bg-white">
            <div class="flex flex-row items-stretch mb-6">
                <img src="<?= base_url('assets/img/logo.svg') ?>" alt="" class="me-2">
                <h2 class="self-center font-bold" style="color: var(--primary-600)">UangKemana</h2>
            </div>
            <div class="greet mb-6">
                <h1 class="font-bold mb-3" style="color: var(--dark-text)">Daftar Akun</h1>
                <p class="text-sm font-semibold" style="color: var(--tinted-gray);">Buat akun dan dompet digital untuk mengatur keuangan anda</p>
            </div>
            <?php if (session()->getFlashdata('error')) : ?>
                <div role="alert" class="alert alert-error alert-soft mb-6">
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>
            <div class="flex justify-center my-3">
                <ul class="steps">
                    <li class="step step-primary">Akun</li>
                    <li class="step step-primary">Buat Dompet</li>
                </ul>
            </div>
            <form action="<?= base_url('/register/buat-dompet/dompet-process') ?>" method="post">
                <div class="grid grid-cols-12">
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nama Dompet</legend>
                            <input type="text" class="input w-full mb-1" placeholder="Masukkan nama dompet" id="nama_dompet" name="nama_dompet" required />
                        </fieldset>
                    </div>
                    <div class="col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Saldo</legend>
                            <input type="number" placeholder="Masukkan saldo" class="input w-full" id="saldo" name="saldo" required />
                        </fieldset>
                    </div>
                </div>
                <div class="flex flex-col">
                    <button type="submit" class="btn btn-lg bg-primary-500 text-[#ffffff] w-full my-4">Daftar Sekarang</button>
                </div>
            </form>
            <p class="text-sm my-3 text-dark-text">Sudah punya akun? <a href="<?= base_url('/login') ?>" class="text-primary-500 font-bold">Login</a> disini</p>
        </div>
        <div class="col-span-12 md:col-span-6">
            <div class="bg-login h-full w-full flex items-center justify-center" 
            style="background-image: url(<?= base_url('assets/img/bg-login.png') ?>); 
                    background-repeat: no-repeat; 
                    background-size: cover; 
                    background-position: center;">
            </div>
        </div>
      </div>
</body>
</html>
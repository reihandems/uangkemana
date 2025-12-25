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
                    <li class="step">Buat Dompet</li>
                </ul>
            </div>
            <form action="<?= base_url('/register/akun-process') ?>" method="post">
                <div class="grid grid-cols-12 md:gap-5">
                    <div class="md:col-span-6 col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Nama Lengkap</legend>
                            <input type="text" class="input w-full mb-1" placeholder="Masukkan nama lengkap" id="name" name="name" required />
                        </fieldset>
                    </div>
                    <div class="md:col-span-6 col-span-12">
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Email</legend>
                            <input type="email" placeholder="Masukkan email" class="input w-full mb-1" id="email" name="email" required />
                        </fieldset>
                    </div>
                </div>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Password</legend>
                    <input type="password" placeholder="Masukkan password" id="password" name="password" class="input w-full mb-1" required />
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Konfirmasi Password</legend>
                    <input type="password" placeholder="Masukkan ulang password" id="password_confirm" name="password_confirm" class="input w-full mb-3" required />
                </fieldset>
                <div class="login-submit flex flex-col">
                    <button type="submit" class="btn btn-lg bg-primary-500 text-[#ffffff] w-full">Selanjutnya</button>
                </div>
                <p class="text-sm my-3 text-dark-text">Sudah punya akun? <a href="<?= base_url('/login') ?>" class="text-primary-500 font-bold">Login</a> disini</p>
            </form>
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
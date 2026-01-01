<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UangKemana - Money Tracker</title>

    <!-- Tailwind + DaisyUI -->
    <link href="<?= base_url('assets/css/output.css') ?>" rel="stylesheet">
</head>
<body class="bg-white text-dark-text">

<!-- ================= NAVBAR ================= -->
<div class="navbar bg-white border-b border-shaded-white px-6 py-3">
    <div class="flex-1">
        <div class="flex flex-row items-center">
            <img src="<?= base_url('assets/img/logo.png') ?>" alt="" class="w-12 hidden md:block">
            <a class="ml-2 text-xl font-bold text-primary-600">UangKemana</a>
        </div>
    </div>
    <div class="flex gap-3">
        <a class="btn btn-ghost btn-sm">Fitur</a>
        <a class="btn btn-ghost btn-sm">Tentang</a>
        <a href="/login" class="btn btn-outline btn-sm">Login</a>
        <a href="/register" class="btn bg-primary-500 btn-sm text-white">Daftar Gratis</a>
    </div>
</div>

<!-- ================= HERO ================= -->
<section class="px-6 py-48 text-center" style="background-image: url(<?= base_url('assets/img/footer.png') ?>); background-position: center;">
    <div class="flex flex-col items-center px-6 md:px-48">
        <h1 class="text-4xl text-primary-900 md:text-5xl font-extrabold mb-6">
            Uang kamu pergi ke mana tiap bulan?
        </h1>
        <p class="text-lg text-shaded-gray mb-8">
            UangKemana membantu kamu mencatat pemasukan dan pengeluaran dengan mudah,
            rapi, dan visual — supaya kamu tahu ke mana uangmu benar-benar pergi.
        </p>
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="/register" class="btn bg-primary-500 text-white border border-primary-500 px-8">
                Mulai Sekarang
            </a>
            <span class="self-center text-sm text-tinted-gray">
                Tahu keuanganmu, mulai dari hari ini.
            </span>
        </div>
    </div>
</section>

<!-- ================= PROBLEM ================= -->
<section class="bg-gray-50 py-20 px-6">
    <div class="max-w-5xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-12">Sering ngalamin ini?</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">💸</h2>
                    <p class="text-center md:text-start text-dark-text">Gaji habis, tapi nggak tahu ke mana perginya</p>
                </div>
            </div>
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">📒</h2>
                    <p class="text-center md:text-start text-dark-text">Catatan keuangan nggak konsisten</p>
                </div>
            </div>
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">📉</h2>
                    <p class="text-center md:text-start text-dark-text">Niat nabung ada, tapi selalu gagal</p>
                </div>
            </div>
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">🤯</h2>
                    <p class="text-center md:text-start text-dark-text">Spreadsheet terlalu ribet</p>
                </div>
            </div>
        </div>

        <p class="mt-10 text-gray-500">
            Tenang, kamu nggak sendirian. Dan kabar baiknya — semua itu bisa diatasi.
        </p>
    </div>
</section>

<!-- ================= FEATURES ================= -->
<section class="py-20 px-6" style="background-image: url(<?= base_url('assets/img/features.png') ?>); background-position: center;">
    <div class="max-w-5xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-16">
            <span class="text-primary-500">UangKemana</span> hadir buat bantu kamu
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">📌 Catat Transaksi dengan Cepat</h2>
                    <p class="text-center md:text-start text-dark-text">Tambah pemasukan dan pengeluaran hanya dalam beberapa detik.</p>
                </div>
            </div>
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">👛 Kelola Banyak Dompet</h2>
                    <p class="text-center md:text-start text-dark-text">Pisahkan uang harian, tabungan, atau bisnis.</p>
                </div>
            </div>
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">🎯 Pantau Budget & Target</h2>
                    <p class="text-center md:text-start text-dark-text">Lihat progres pengeluaranmu secara real-time.</p>
                </div>
            </div>
            <div class="card bg-base-100 card-md shadow-sm">
                <div class="card-body">
                    <h2 class="card-title justify-center md:justify-start">📊 Insight yang Mudah Dipahami</h2>
                    <p class="text-center md:text-start text-dark-text">Grafik dan ringkasan yang langsung bisa dimengerti.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= HOW IT WORKS ================= -->
<section class="bg-gray-50 py-20 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-12">Cara Pakainya Gampang</h2>

        <ul class="steps steps-vertical lg:steps-horizontal">
            <li class="step step-primary">Daftar Akun</li>
            <li class="step step-primary">Buat Dompet</li>
            <li class="step step-primary">Catat Transaksi</li>
            <li class="step">Pantau Keuangan</li>
        </ul>

        <p class="mt-10 text-gray-500">
            Tanpa ribet. Tanpa belajar akuntansi.
        </p>
    </div>
</section>

<!-- ================= CTA ================= -->
<section class="py-20 px-6 text-center" style="background-image: url(<?= base_url('assets/img/footer.png') ?>);">
    <h2 class="text-3xl font-bold mb-4">
        Saatnya tahu ke mana uangmu pergi.
    </h2>
    <p class="text-gray-500 mb-8">
        Mulai catat keuanganmu hari ini dan bangun kebiasaan finansial yang lebih sehat.
    </p>
    <a href="/register" class="btn bg-primary-500 text-white px-10">
        Mulai Catat Sekarang
    </a>
</section>

<!-- ================= FOOTER ================= -->
<footer class="border-t border-shaded-white py-6 text-center text-sm text-gray-400">
    © 2025 UangKemana — Catat. Pahami. Kendalikan.
</footer>

</body>
</html>

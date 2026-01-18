<!doctype html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tentang - Money Tracker</title>
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
                <a href="#features" class="btn btn-ghost btn-sm transition">Fitur</a>
                <a class="btn btn-ghost btn-sm">Tentang</a>
                <a href="/login" class="btn btn-outline btn-sm">Login</a>
                <a href="/register" class="btn bg-primary-500 btn-sm text-white">Daftar Gratis</a>
            </div>
        </div>

        <section class="max-w-5xl mx-auto px-6 py-16 space-y-20">

            <!-- Hero -->
            <div class="text-center space-y-4">
                <h1 class="text-4xl font-bold text-primary-600">Tentang UangKemana</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                Aplikasi pencatat keuangan yang membantu kamu sadar ke mana uangmu benar-benar pergi.
                </p>
            </div>

            <!-- Masalah -->
            <div class="space-y-6">
                <h2 class="text-2xl font-semibold">Masalah yang sering terjadi</h2>
                <ul class="grid md:grid-cols-2 gap-4">
                <li class="card bg-base-100 shadow-sm p-4">💸 Gaji habis tanpa terasa</li>
                <li class="card bg-base-100 shadow-sm p-4">📒 Catatan nggak konsisten</li>
                <li class="card bg-base-100 shadow-sm p-4">📉 Budget gagal terus</li>
                <li class="card bg-base-100 shadow-sm p-4">🤯 Spreadsheet ribet</li>
                </ul>
            </div>

            <!-- Solusi -->
            <div class="space-y-6">
                <h2 class="text-2xl font-semibold">Solusi dari UangKemana</h2>
                <p class="text-gray-600">
                Kami membuat UangKemana agar pencatatan keuangan terasa ringan dan masuk akal.
                </p>
                <ul class="list-disc ml-6 text-gray-700">
                <li>Pencatatan transaksi harian</li>
                <li>Analisis otomatis</li>
                <li>Budget per kategori</li>
                <li>Visual yang mudah dipahami</li>
                </ul>
            </div>

            <!-- Nilai -->
            <div class="space-y-6">
                <h2 class="text-2xl font-semibold">Prinsip Kami</h2>
                <div class="grid md:grid-cols-3 gap-4">
                <div class="card p-4 shadow-sm">✨ Sederhana</div>
                <div class="card p-4 shadow-sm">🔍 Jujur</div>
                <div class="card p-4 shadow-sm">🤝 Membantu</div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center space-y-4">
                <h2 class="text-2xl font-semibold">Siap mulai?</h2>
                <a href="/register" class="btn btn-primary">Mulai Gratis Sekarang</a>
            </div>

        </section>

        <!-- ================= FOOTER ================= -->
        <footer class="border-t border-shaded-white py-6 text-center text-sm text-gray-400">
            © 2025 UangKemana — Catat. Pahami. Kendalikan.
        </footer>

    </body>
</html>

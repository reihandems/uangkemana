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
        <!-- Sidebar -->
        <div class="col-span-12 md:col-span-3">
            <?= $this->include('layout/sidebar_admin', ['menu' => $menu]) ?>
        </div>
        <!-- Sidebar end -->
        <!-- Kanan -->
        <div class=" col-span-12 md:col-span-9 min-h-screen">
            <div class="bg-[#ffffff]">
                <?= $this->include('layout/header') ?>
            </div>
            <?= $this->renderSection('content') ?>
        </div>
        <!-- Kanan end -->
    </div>
    <script>
        function showPageLoading() {
            const loading = document.getElementById('page-loading');
            const content = document.getElementById('page-content');

            if (loading && content) {
                loading.classList.remove('hidden');
                content.classList.add('hidden');
            }
        }

        function hidePageLoading() {
            const loading = document.getElementById('page-loading');
            const content = document.getElementById('page-content');

            if (loading && content) {
                loading.classList.add('hidden');
                content.classList.remove('hidden');
            }
        }

        // Tampilkan skeleton SEBELUM halaman dirender
        showPageLoading();

        document.addEventListener('DOMContentLoaded', function() {
            // Kasih delay dikit biar kelihatan (UX)
            setTimeout(() => {
                hidePageLoading();
            }, 400);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>
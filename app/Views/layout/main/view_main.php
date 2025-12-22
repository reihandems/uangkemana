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
        <?= $this->include('layout/sidebar', ['menu' => $menu ?? null]) ?>
        <!-- Sidebar end -->
        <!-- Kanan -->
        <div class=" col-span-12 md:col-span-9 min-h-screen" style="padding: 30px 30px 30px 40px; background-color: var(--background-color);">
            <?= $this->include('layout/header') ?>
            <hr class="my-4" style="color: var(--secondary-stroke);">
            <?= $this->renderSection('content') ?>
        </div>
        <!-- Kanan end -->
    </div>
    <?= $this->renderSection('scripts') ?>
</body>
</html>
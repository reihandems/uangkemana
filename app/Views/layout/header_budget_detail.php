<!-- Header -->
<div class="flex flex-col md:flex-row items-center py-5 px-8">
    <a href="<?= base_url('/user/budget') ?>">
        <button class="btn btn-square btn-lg bg-white border-2 border-black">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M26.6666 14.6671V17.3338H10.6666L18 24.6671L16.1066 26.5604L5.54663 16.0004L16.1066 5.44043L18 7.33376L10.6666 14.6671H26.6666Z" fill="#333333"/>
            </svg>
        </button>
    </a>
    <div class="flex flex-col ml-5">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="<?= base_url('/user/transaksi') ?>">Budget</a></li>
                <li>Detail Budget</li>
            </ul>
        </div>
        <h2 class="page-title" style="color: var(--dark-text);"><?= $pageTitle ?? '' ?></h2>
    </div>
    
</div>
<!-- Header end -->
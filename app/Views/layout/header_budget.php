<!-- Header -->
<div class="flex flex-row justify-between items-center py-5 px-8">
    <div class="flex flex-col">
        <h2 class="page-title" style="color: var(--dark-text);"><?= $pageTitle ?? '' ?></h2>
        <p class="text-sm font-medium hidden md:block" style="color: var(--tinted-gray);"><?= $subTitle ?? '' ?></p>
    </div>
    <button class="btn md:btn-lg bg-primary-500 text-white" onclick="modal_budget.showModal()">
        <svg width="28" height="28" viewBox="0 0 40 40" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M33.05 12.5002L29.2667 8.71683C29.3833 8.01683 29.5667 7.36683 29.8 6.80016C29.96 6.42065 30.0237 6.00744 29.9853 5.59737C29.9469 5.18729 29.8076 4.79308 29.5799 4.44988C29.3522 4.10668 29.0431 3.82514 28.6802 3.63035C28.3173 3.43556 27.9119 3.33358 27.5 3.3335C24.7667 3.3335 22.35 4.65016 20.8333 6.66683H12.5C7.43334 6.66683 3.33334 10.7668 3.33334 15.8335C3.33334 20.9002 7.5 35.0002 7.5 35.0002H16.6667V31.6668H20V35.0002H29.1667L31.9667 25.6835L36.6667 24.1168V12.5002H33.05ZM21.6667 15.0002H13.3333V11.6668H21.6667V15.0002ZM26.6667 18.3335C25.75 18.3335 25 17.5835 25 16.6668C25 15.7502 25.75 15.0002 26.6667 15.0002C27.5833 15.0002 28.3333 15.7502 28.3333 16.6668C28.3333 17.5835 27.5833 18.3335 26.6667 18.3335Z"/>
        </svg>
        Buat Budget
    </button>
</div>
<!-- Header end -->
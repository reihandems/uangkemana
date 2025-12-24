<?= $this->extend('layout/main/view_main_dompet') ?>
<?= $this->section('content') ?>
    <!-- Main Content -->
    <div class="ringkasan font-semibold p-8">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border border-shaded-white">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.3333 5H11.6667C7.98333 5 5 7.98333 5 11.6667V28.3333C5 32.0167 7.98333 35 11.6667 35H31.6667C33.5167 35 35 33.5167 35 31.6667V15C35 14.1159 34.6488 13.2681 34.0237 12.643C33.3986 12.0179 32.5507 11.6667 31.6667 11.6667V8.33333C31.6667 7.44928 31.3155 6.60143 30.6904 5.97631C30.0652 5.35119 29.2174 5 28.3333 5ZM28.3333 8.33333V11.6667H11.6667C10.45 11.6667 9.31667 12 8.33333 12.5667V11.6667C8.33333 9.83333 9.83333 8.33333 11.6667 8.33333M25.8333 25.8333C24.45 25.8333 23.3333 24.7167 23.3333 23.3333C23.3333 21.95 24.45 20.8333 25.8333 20.8333C27.2167 20.8333 28.3333 21.95 28.3333 23.3333C28.3333 24.7167 27.2167 25.8333 25.8333 25.8333Z" fill="#333333"/>
                        </svg>
                        <p class="mt-2 text-2xl">Uang Jajan Adhe</p>
                        <p class="text-sm text-pale-gray my-2">Indonesian Rupiah (IDR)</p>
                        <p class="text-3xl text-primary-500 font-black">Rp. 313,500</p>
                    </div>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn bg-white m-1">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 16C12.5304 16 13.0391 16.2107 13.4142 16.5858C13.7893 16.9609 14 17.4696 14 18C14 18.5304 13.7893 19.0391 13.4142 19.4142C13.0391 19.7893 12.5304 20 12 20C11.4696 20 10.9609 19.7893 10.5858 19.4142C10.2107 19.0391 10 18.5304 10 18C10 17.4696 10.2107 16.9609 10.5858 16.5858C10.9609 16.2107 11.4696 16 12 16ZM12 10C12.5304 10 13.0391 10.2107 13.4142 10.5858C13.7893 10.9609 14 11.4696 14 12C14 12.5304 13.7893 13.0391 13.4142 13.4142C13.0391 13.7893 12.5304 14 12 14C11.4696 14 10.9609 13.7893 10.5858 13.4142C10.2107 13.0391 10 12.5304 10 12C10 11.4696 10.2107 10.9609 10.5858 10.5858C10.9609 10.2107 11.4696 10 12 10ZM12 4C12.5304 4 13.0391 4.21071 13.4142 4.58579C13.7893 4.96086 14 5.46957 14 6C14 6.53043 13.7893 7.03914 13.4142 7.41421C13.0391 7.78929 12.5304 8 12 8C11.4696 8 10.9609 7.78929 10.5858 7.41421C10.2107 7.03914 10 6.53043 10 6C10 5.46957 10.2107 4.96086 10.5858 4.58579C10.9609 4.21071 11.4696 4 12 4Z" fill="black"/>
                            </svg>
                        </div>
                        <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                            <li>
                                <a onclick="modal_dompet.showModal()">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.71 7.03957C21.1 6.64957 21.1 5.99957 20.71 5.62957L18.37 3.28957C18 2.89957 17.35 2.89957 16.96 3.28957L15.12 5.11957L18.87 8.86957M3 17.2496V20.9996H6.75L17.81 9.92957L14.06 6.17957L3 17.2496Z" fill="black"/>
                                    </svg>
                                    Edit
                                </a>
                            </li>
                            <li>
                                <a class="text-danger-500" >
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
            <a href="#" class="col-span-12 sm:col-span-6 bg-white rounded-xl py-6 px-8 border-3 border-dashed border-primary-500" onclick="modal_dompet.showModal()">
                <div class="flex items-center h-full justify-center">
                    <p class="text-lg md:text-xl text-primary-500">+ Tambah Dompet Baru</p>
                </div>
            </a>
        </div>
    </div>
    <!-- Main Content end -->
<?= $this->endSection() ?>
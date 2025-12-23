# 💰 UangKemana

UangKemana adalah aplikasi money tracker berbasis web yang membantu pengguna mencatat pemasukan dan pengeluaran, mengelola dompet, serta membuat target keuangan (budget) secara terstruktur. Project ini dikembangkan sebagai tugas kelompok mata kuliah Pemrograman Framework dengan fokus pada penerapan konsep MVC, UML, dan integrasi UI/UX ke dalam sistem backend.

## 🚀 Fitur Utama

- Autentikasi pengguna (Register & Login)
- Manajemen dompet (Wallet)
- Pencatatan transaksi pemasukan dan pengeluaran
- Pengelolaan kategori transaksi
- Budget berbasis target (Goal-based Budgeting)
- Dashboard ringkasan keuangan
- Antarmuka modern menggunakan Tailwind CSS dan DaisyUI

## 🛠️ Teknologi yang Digunakan

Backend:
- PHP 8+
- CodeIgniter 4
- MySQL / MariaDB

Frontend:
- Tailwind CSS (CLI)
- DaisyUI
- HTML (View CodeIgniter 4)

Tools Pendukung:
- Node.js & npm
- phpMyAdmin
- PlantUML (UML Diagram)

## 🧱 Arsitektur Aplikasi

Aplikasi UangKemana menerapkan arsitektur MVC (Model–View–Controller), di mana Model bertugas mengelola data dan interaksi dengan database, View menangani tampilan antarmuka pengguna, dan Controller mengatur alur logika aplikasi.

Perancangan sistem juga dilengkapi dengan diagram UML berikut:
- Use Case Diagram
- Activity Diagram
- Sequence Diagram
- Class Diagram
- ERD (Entity Relationship Diagram)

## 🗄️ Struktur Database

Struktur database dirancang berdasarkan kebutuhan sistem dan disesuaikan dengan desain UI/UX aplikasi. Entity utama yang digunakan dalam aplikasi ini meliputi:
- users
- wallets
- categories
- transactions
- budgets

## ⚙️ Instalasi & Setup

1. Clone repository  
    git clone https://github.com/username/uangkemana.git  
    cd uangkemana  

2. Install dependency backend  
    composer install  

3. Install dependency frontend  
    npm install  

4. Konfigurasi environment  
   Salin file .env.example menjadi .env, lalu sesuaikan konfigurasi database:  

    database.default.hostname = localhost  
    database.default.database = db_uangkemana  
    database.default.username = root  
    database.default.password =  

5. Build Tailwind CSS  
    npm run dev  

6. Jalankan server  
    php spark serve  

Akses aplikasi melalui browser:  
    http://localhost:8080  

## 📂 Struktur Folder Penting

    app/
     ├── Controllers/
     ├── Models/
     ├── Views/

    public/
     └── assets/css/output.css

    resources/
     └── css/input.css

## 📑 Catatan Pengembangan

- Validasi dan pengecekan data dilakukan melalui phpMyAdmin
- Styling menggunakan Tailwind CSS CLI yang terintegrasi dengan DaisyUI
- Project berfokus pada penerapan konsep framework, UML, dan integrasi UI/UX

## 👥 Tim Pengembang

Project ini dikembangkan oleh kelompok 7 sebagai bagian dari tugas akademik mata kuliah Pemrograman Framework.

## 📜 Lisensi

Project ini dibuat untuk keperluan pembelajaran dan akademik. Bebas digunakan sebagai referensi dengan mencantumkan sumber.

## ✨ Penutup

UangKemana dikembangkan untuk menunjukkan pemahaman dalam pemrograman framework, perancangan sistem menggunakan UML, serta integrasi desain UI/UX dengan implementasi backend.

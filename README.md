<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# 📝 TeamSync Manager

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

**TeamSync Manager** adalah aplikasi manajemen tugas tim berbasis web yang dirancang untuk mempermudah kolaborasi dan transparansi pekerjaan. Aplikasi ini memisahkan peran antara **Admin** (Manajer) yang mengelola tugas & kelompok, dan **User** (Anggota Tim) yang mengerjakan tugas.

Dibangun dengan **Laravel 12** dan **Breeze (Tailwind CSS)**, aplikasi ini menawarkan antarmuka modern dan responsif.

---

## 🔥 Fitur Utama

-   **🔐 Role-Based Access Control (RBAC):** Pembedaan akses antara Admin dan User menggunakan Middleware.
-   **👥 Manajemen Kelompok (Groups):**
    -   Admin dapat membuat, mengedit, dan menghapus kelompok kerja.
    -   User dapat mencari dan bergabung (*Join*) ke dalam kelompok.
-   **✅ Manajemen Tugas (Tasks):**
    -   **Admin:** Membuat tugas dengan fitur **Filter User per Kelompok** (JavaScript Integration) agar lebih mudah mencari anggota tim.
    -   **User:** Melihat daftar tugas pribadi dan mengupdate status (*Pending* ➝ *In Progress* ➝ *Completed*).
-   **📊 Dashboard Monitoring:** Ringkasan jumlah tugas dan aktivitas untuk Admin.
-   **📱 Tampilan Responsif:** Desain modern dan rapi di desktop maupun mobile.

---

## 🛠️ Teknologi yang Digunakan

-   **Framework Backend:** Laravel 12 (PHP)
-   **Frontend:** Blade Templates + Tailwind CSS (via Laravel Breeze)
-   **Database:** MySQL / SQLite
-   **Scripting:** JavaScript (untuk logika filter dropdown dinamis)
-   **Tools:** Git, Composer, NPM

---

## 🚀 Cara Menjalankan Project (Installation)

Ikuti langkah ini untuk menjalankan project di komputer lokal (Localhost):

1.  **Clone Repository**
    ```bash
    git clone https://github.com/AndikaAviaLukita/Project-PSIWBL-individu.git
    cd Project-PSIWBL-individu
    cd Sistem-manajemen-tugas-tim
    ```

2.  **Install Dependencies**
    Install library PHP dan aset JavaScript:
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    -   Duplikat file `.env.example` menjadi `.env`.
    -   Sesuaikan konfigurasi database di file `.env`.
        ```env
        DB_CONNECTION=sqlite
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Key & Migrasi Database**
    Jalankan perintah ini untuk membuat tabel dan mengisi **Data Dummy (Admin & User)**:
    ```bash
    php artisan key:generate
    php artisan migrate:fresh --seed
    ```

5.  **Jalankan Server**
    Anda perlu menjalankan dua terminal terpisah:

    *Terminal 1 (Server PHP):*
    ```bash
    php artisan serve
    ```

    *Terminal 2 (Compile CSS/JS Real-time):*
    ```bash
    npm run dev
    ```

6.  **Akses Aplikasi**
    Buka browser dan akses: `http://localhost:8000`

---

## 👤 Akun Demo (Login)

Gunakan akun berikut untuk masuk ke dalam aplikasi setelah melakukan seeding:

| Role      | Email             | Password   |
| :-------- | :---------------- | :--------- |
| **Admin** | `admin@admin.com` | `password` |
| **User** | `user@user.com`   | `password` |

---

## 👨‍💻 Author

**Nama:** Andika Avia Lukita
-   **NIM:** 2303135262
-   **Mata Kuliah:** Pengembangan Sistem Informasi Berbasis Web Lanjut

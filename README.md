# Project Management System (Gems Test)

Sistem manajemen proyek sederhana berbasis Laravel untuk mengelola *Work Packages*, *Bill of Quantities* (BOQ), dan pelacakan progress by date.

## Prerequisites

Pastikan perangkat Anda sudah terinstall:
* PHP >= 8.2
* Composer
* MySQL / MariaDB
* Web Server (Apache/Nginx/Artisan Serve)

## Installation Guide

Ikuti langkah-langkah di bawah ini untuk menjalankan project di lingkungan lokal:

### 1. Clone Repository
```bash
git clone [https://github.com/username/project-name.git](https://github.com/username/project-name.git)
cd project-name
```

### 2. Install Dependency
```bash
composer install
npm install && npm run build
```

## 3. Konfigurasi Database
Buat database baru di MySQL dengan nama:
```bash
gems_test
```

Sesuaikan konfigurasi database di file .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gems_test
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi Database & Seeding
Jalankan perintah ini untuk membuat tabel beserta data awal:
```Bash
php artisan migrate:fresh --seed --seeder=AddDataSeeder
```

### 5. Menjalankan Aplikasi
```Bash
php artisan serve
```
Akses aplikasi melalui browser:
```Bash
http://127.0.0.1:8000
```

### Catatan Penting
- Aplikasi ini tidak menyediakan form input data melalui UI.
- Jika ingin menambahkan atau mengubah data, silakan edit isi data pada file:
```Bash
database/seeders/AddDataSeeder.php
```
Lalu jalankan ulang tahap migrasi:
```Bash
php artisan migrate:fresh --seed --seeder=AddDataSeeder
```

### Perhatian Saat Menambah Data
- Pastikan nilai code atau id tidak sama dengan data yang sudah ada.
- Jika menambahkan data progress, pastikan relasi boq_code sesuai dengan data BOQ yang ada.
Contoh:
```Bash
ProgressEntry::create([
    'boq_code' => $boq1->boq_code,
    'actual_qty' => 40,
    'progress_date' => '2026-01-10',
]);
```
Pastikan:
- $boq1 adalah objek BOQ yang valid
- boq_code mengacu pada BOQ yang benar

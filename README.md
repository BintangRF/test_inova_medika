# 🏥 Aplikasi Manajemen Klinik - Laravel

Sistem ini dirancang untuk mengelola aktivitas operasional klinik, mulai dari pengelolaan data master hingga transaksi pasien dan laporan berbasis data. Dibangun menggunakan Laravel 10+, sistem ini mendukung fitur role-based access control (RBAC), CRUD, pembayaran, dan visualisasi laporan.

---

## 🚀 Fitur Utama

### 1. Autentikasi & Role Pengguna

Sistem mendukung autentikasi pengguna dengan pembagian peran (role-based access control):

-   **Admin**: Memiliki akses penuh ke seluruh fitur aplikasi,
-   **Dokter**: Dapat mengakses dan memproses tindakan medis serta meresepkan obat untuk pasien.
-   **Kasir**: Bertanggung jawab untuk melihat, memproses, dan menandai pembayaran tagihan pasien.
-   **Petugas**: Mengelola pendaftaran pasien baru, kunjungan, serta input data transaksi awal.

Setiap pengguna harus login untuk mengakses aplikasi, dan fitur yang tersedia akan menyesuaikan dengan peran yang dimiliki.

---

### 2. Manajemen Data Master

CRUD (Create, Read, Update, Delete) untuk entitas berikut:

-   **Pasien**: Data pasien klinik (nama, NIK, alamat, no. telepon).
-   **Pegawai**: Data pegawai klinik beserta jabatan dan peran.
-   **Tindakan**: Jenis layanan medis seperti periksa umum, cek laboratorium, dll.
-   **Obat**: Daftar obat yang tersedia, termasuk harga.

---

### 3. Transaksi Pendaftaran Pasien

Menu ini memungkinkan petugas untuk:

-   Menginput data **pasien baru** sekaligus,
-   Melakukan pendaftaran **kunjungan** pada tanggal tertentu dan memilih jenis kunjungan (umum, BPJS, dll).

📝 Input disimpan langsung ke dua tabel:

-   `pasien`
-   `kunjungan_pasien` (pembuatan otomatis ketika pasien mendaftar)

---

### 4. Transaksi Tindakan & Obat

Setelah pasien terdaftar:

-   Dokter/petugas dapat memberikan **tindakan medis**,
-   Menambahkan **obat yang diresepkan**,
-   Otomatis mengurangi **jumlah stok obat yang diresepkan**.

Fitur:

-   Tombol aksi "Proses" untuk menambahkan tindakan dan obat,
-   Semua data dicatat di tabel `transaksi_tindakan`.

---

### 5. Pembayaran (Tagihan Pasien)

Fitur ini digunakan oleh kasir untuk:

-   Melihat daftar tagihan pasien yang belum dibayar,
-   Melakukan pembayaran dan menandai transaksi sebagai `paid`.

Detail:

-   Total tagihan dihitung dari **harga tindakan + harga obat**,
-   Tagihan disaring berdasarkan transaksi yang belum dibayar (`is_paid = false`).

---

### 6. Laporan Visualisasi Data

Laporan tersedia untuk administrator dengan visualisasi sederhana:

-   📊 **Jumlah kunjungan pasien per bulan**,
-   🩺 **Jenis tindakan terbanyak dilakukan**,
-   💊 **Obat yang paling sering diresepkan**.

Data disajikan dalam bentuk list (bisa dikembangkan menggunakan grafik/Chart.js).

---

## 🔐 Role-Based Access Control (RBAC)

Aplikasi mendukung sistem peran:

-   **Admin**: Akses penuh ke seluruh fitur.
-   **Petugas**: Bisa mengelola pendaftaran dan input transaksi.
-   **Dokter**: Bisa memproses tindakan dan obat.
-   **Kasir**: Bisa mengakses dan memproses pembayaran.

---

## ⚙️ Teknologi yang Digunakan

-   **Laravel 10+**
-   **Blade Components & Tailwind CSS**
-   **MySQL** untuk penyimpanan data
-   **Laravel Breeze** (atau Jetstream/Fortify) untuk otentikasi
-   **Middleware & Policy** untuk RBAC
-   **Eloquent Relationship** untuk manajemen relasi data
-   **Chart.js** _(opsional untuk grafik)_

---

## 📁 Struktur Folder Penting

```app/
├── Models/ # Model Eloquent untuk semua entitas
├── Http/Controllers/ # Controller untuk CRUD, transaksi, dan laporan
resources/views/ # Blade templates untuk tampilan frontend
routes/web.php # Routing aplikasi
database/migrations/ # Struktur database
```

---

## 📦 Cara Menjalankan Aplikasi

1. Clone repo ini:
    ```bash
    git clone https://github.com/username/klinik-app.git
    cd klinik-app
    ```

````

2. Install dependensi:

    ```bash
    composer install
    npm install && npm run dev
    ```

3. Salin file `.env` dan buat database:

    ```bash
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
    ```

4. Jalankan server:

    ```bash
    php artisan serve
    ```
````

---

## Screenshots

1. AUTH
   ![WELCOME](http://localhost:8000/images/welcome.png)
   ![LOGIN](http://localhost:8000/images/login.png)
   ![REGISTER](http://localhost:8000/images/register.png)

2. ADMIN
   ![Admin Dashboard](http://localhost:8000/images/admin-dashboard.png)  
   ![CRUD Obat](http://localhost:8000/images/crud-obat.png)
   ![CRUD Pegawai](http://localhost:8000/images/crud-pegawai.png)
   ![CRUD Tindakan](http://localhost:8000/images/crud-tindakan.png)
   ![CRUD User](http://localhost:8000/images/crud-user.png)
   ![CRUD Wilayah](http://localhost:8000/images/crud-wilayah.png)
   ![Report](http://localhost:8000/images/report.png)

3. Petugas
   ![Petugas Dashboard](http://localhost:8000/images/petugas-dashboard.png)
   ![Data Tindakan pada Pasien](http://localhost:8000/images/data-tindakan-pada-pasien-2.png)
   ![Daftar Pasien](http://localhost:8000/images/daftar-pasien-2.png)

4. Dokter
   ![Dokter Dashboard](http://localhost:8000/images/dokter-dashboard.png)
   ![Data Tindakan pada Pasien](http://localhost:8000/images/data-tindakan-pada-pasien.png)
   ![Daftar Pasien](http://localhost:8000/images/daftar-pasien.png)
   ![Proses Pasien](http://localhost:8000/images/proses-tindakan-pasien.png)

5. Kasir
   ![Kasir Dashboard](http://localhost:8000/images/kasir-dashboard.png)
   ![Pembayaran](http://localhost:8000/images/pembayaran.png)

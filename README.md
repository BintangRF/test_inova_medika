```markdown
# 🏥 Aplikasi Manajemen Klinik - Laravel

Sistem ini dirancang untuk mengelola aktivitas operasional klinik, mulai dari pengelolaan data master hingga transaksi pasien dan laporan berbasis data. Dibangun menggunakan Laravel 10+, sistem ini mendukung fitur role-based access control (RBAC), CRUD, pembayaran, dan visualisasi laporan.

---

## 🚀 Fitur Utama

### 1. Manajemen Data Master

CRUD (Create, Read, Update, Delete) untuk entitas berikut:

-   **Pasien**: Data pasien klinik (nama, NIK, alamat, no. telepon).
-   **Pegawai**: Data pegawai klinik beserta jabatan dan peran.
-   **Tindakan**: Jenis layanan medis seperti periksa umum, cek laboratorium, dll.
-   **Obat**: Daftar obat yang tersedia, termasuk harga.

---

### 2. Transaksi Pendaftaran Pasien

Menu ini memungkinkan petugas untuk:

-   Menginput data **pasien baru** sekaligus,
-   Melakukan pendaftaran **kunjungan** pada tanggal tertentu dan memilih jenis kunjungan (umum, BPJS, dll).

📝 Input disimpan langsung ke dua tabel:

-   `pasien`
-   `kunjungan_pasien` (pembuatan otomatis ketika pasien mendaftar)

---

### 3. Transaksi Tindakan & Obat

Setelah pasien terdaftar:

-   Dokter/petugas dapat memberikan **tindakan medis**,
-   Menambahkan **obat yang diresepkan**.

Fitur:

-   Tombol aksi "Proses" untuk menambahkan tindakan dan obat,
-   Tombol "Edit" untuk memperbarui semua data transaksi,
-   Semua data dicatat di tabel `transaksi_tindakan`.

---

### 4. Pembayaran (Tagihan Pasien)

Fitur ini digunakan oleh kasir untuk:

-   Melihat daftar tagihan pasien yang belum dibayar,
-   Melakukan pembayaran dan menandai transaksi sebagai `paid`.

Detail:

-   Total tagihan dihitung dari **harga tindakan + harga obat**,
-   Tagihan disaring berdasarkan transaksi yang belum dibayar (`is_paid = false`).

---

### 5. Laporan Visualisasi Data

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
```

app/
├── Models/ # Model Eloquent untuk semua entitas
├── Http/Controllers/ # Controller untuk CRUD, transaksi, dan laporan
resources/views/ # Blade templates untuk tampilan frontend
routes/web.php # Routing aplikasi
database/migrations/ # Struktur database

````

---

## 📦 Cara Menjalankan Aplikasi

1. Clone repo ini:
   ```bash
   git clone https://github.com/username/klinik-app.git
   cd klinik-app
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

---

## 🙌 Kontribusi

Kontribusi sangat diterima! Silakan fork, buat branch baru, dan ajukan pull request.

---

## 📄 Lisensi

Aplikasi ini menggunakan lisensi [MIT](LICENSE).

```

---

```

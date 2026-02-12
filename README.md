<p align="center">
    <h1 align="center">Sosial Menyapa</h1>
    <p align="center">Sistem Pelayanan Kesejahteraan Sosial Terpadu</p>
    <br>
</p>

## 📖 Tentang Aplikasi

**Sosial Menyapa** adalah aplikasi pelayanan kesejahteraan sosial yang dirancang untuk mempermudah proses pengajuan, verifikasi, dan validasi bantuan sosial. Sistem ini menggunakan **Role-Based Access Control (RBAC)** untuk memastikan setiap pengguna hanya mengakses fitur dan data sesuai dengan kewenangannya, mulai dari tingkat masyarakat hingga dinas terkait.

---

## 👥 Pengguna & Hak Akses (Roles)

Aplikasi ini membagi pengguna ke dalam 5 peran utama dengan hak akses spesifik:

### 1. 🛠️ Admin Aplikasi
**Keterangan:** Dikelola oleh tim pengembang atau unit teknis internal Dinas Sosial.
*   **Hak Akses:**
    *   Mengelola pengguna (buat/edit/hapus).
    *   Mengelola wilayah administrasi (kecamatan & kelurahan).
    *   Melihat seluruh data pengajuan.
    *   Memonitor aktivitas pengguna.
    *   Akses penuh terhadap semua fitur aplikasi.

### 2. 🏛️ Kelurahan
**Keterangan:** Dapat membuat pengajuan langsung maupun melakukan verifikasi atas pengajuan dari PSM.
*   **Hak Akses:**
    *   Melakukan pengajuan data PPKS, Santunan Kematian, dan Santunan Disabilitas.
    *   Melihat, mengedit, dan menghapus data pengajuan yang diajukan oleh kelurahannya.
    *   Memverifikasi pengajuan dari PSM di bawah wilayah kerjanya.
    *   Melihat status validasi dan approval oleh kecamatan dan Dinas Sosial.

### 3. 🏢 Kecamatan
**Keterangan:** Berfungsi sebagai lapisan kontrol administratif tingkat menengah sebelum pengajuan dilanjutkan ke Dinas Sosial.
*   **Hak Akses:**
    *   Melihat semua pengajuan dari seluruh kelurahan dalam wilayahnya.
    *   Melakukan validasi administratif terhadap pengajuan yang telah diverifikasi kelurahan.
    *   Memberi catatan atau mengembalikan pengajuan yang tidak sesuai.

### 4. 🏛️ Dinas Sosial (Dinsos)
**Keterangan:** Pemegang wewenang tertinggi dalam menyetujui bantuan sosial.
*   **Hak Akses:**
    *   Melihat seluruh data pengajuan dari semua wilayah.
    *   Memberikan keputusan akhir (approve/reject) pada setiap pengajuan.
    *   Menyimpan dokumentasi persetujuan.
    *   Menyetujui atau menolak akun PSM baru.

### 5. 🤝 PSM (Pekerja Sosial Masyarakat)
**Keterangan:** Bekerja langsung di lapangan untuk mendata dan mendampingi warga. Wajib registrasi dan verifikasi Dinsos.
*   **Hak Akses:**
    *   Mengajukan data PPKS, Santunan Kematian, dan Santunan Disabilitas.
    *   Melihat status pengajuan yang diajukan.
    *   Melengkapi dokumen pendukung dan informasi tambahan.

---

## 🔄 Alur Pengajuan Layanan

Sistem verifikasi dan validasi bertingkat untuk memastikan keakuratan data dan kelayakan penerima bantuan.

### 🧾 Jenis Layanan
1.  **PPKS** (Pemerlu Pelayanan Kesejahteraan Sosial)
2.  **Santunan Kematian**
3.  **Santunan Disabilitas**

### 📋 Tahapan Proses
1.  **Pengajuan Awal (PSM/Kelurahan)**
    *   PSM log in (setelah akun disetujui Dinsos) atau Kelurahan mengakses sistem.
    *   Mengisi formulir sesuai jenis bantuan & melampirkan dokumen wajib.
    *   Pengajuan otomatis masuk ke daftar verifikasi Kelurahan.
2.  **Verifikasi Kelurahan**
    *   Petugas Kelurahan memeriksa validitas data.
    *   **Sesuai:** Status menjadi *Terverifikasi* -> Lanjut ke Kecamatan.
    *   **Tidak Sesuai:** Dikembalikan dengan catatan perbaikan.
3.  **Validasi Kecamatan**
    *   Kecamatan mengevaluasi kelayakan administratif & teknis.
    *   **Valid:** Status menjadi *Tervalidasi* -> Lanjut ke Dinas Sosial.
    *   **Tidak Valid:** Dikembalikan ke Kelurahan untuk revisi.
4.  **Persetujuan Dinas Sosial**
    *   Dinsos melakukan pemeriksaan akhir dan approval.
    *   **Disetujui:** Bantuan diproses, pemohon menerima notifikasi.
    *   **Ditolak:** Sistem mencatat alasan penolakan.

---

## 💻 Panduan Teknis (Untuk Developer)

Aplikasi ini dibangun menggunakan framework [Yii 2](http://www.yiiframework.com/).

### Persyaratan Sistem (Requirements)
*   PHP 7.4 atau lebih baru.
*   Composer.
*   Web Server (Apache/Nginx).
*   Database (MySQL/MariaDB).

### Instalasi

1.  **Install via Composer**
    Jika Anda belum memiliki Composer, install dari [getcomposer.org](http://getcomposer.org/).
    ```bash
    composer create-project --prefer-dist yiisoft/yii2-app-basic sosialmenyapa
    ```

2.  **Konfigurasi Database**
    Edit file `config/db.php` dengan kredensial database Anda:
    ```php
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=sosialmenyapa',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];
    ```

3.  **Migrasi Database**
    Jalankan perintah migrasi untuk membuat tabel yang diperlukan (jika ada):
    ```bash
    php yii migrate
    ```

4.  **Menjalankan Aplikasi**
    Anda dapat menggunakan built-in web server PHP untuk pengembangan:
    ```bash
    php yii serve
    ```
    Akses aplikasi di: `http://localhost:8080/`

### Struktur Direktori

      assets/             definisi aset (css/js)
      commands/           console commands
      config/             konfigurasi aplikasi
      controllers/        web controllers (logika aplikasi)
      models/             model classes (database & form)
      views/              view files (tampilan antarmuka)
      web/                entry script dan resource publik
      tests/              unit & functional tests

---
<p align="center">
    Dibuat dengan ❤️ untuk pelayanan sosial yang lebih baik.
</p>

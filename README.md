# 🎬 Sewa Film

Website Rental Film sederhana berbasis **PHP** untuk mengelola penyewaan film secara online.

## 📌 Deskripsi
Proyek ini adalah aplikasi web sederhana yang dibuat dengan **PHP**, **JavaScript**, dan **CSS**. Fungsinya untuk membantu proses penyewaan film mulai dari pendaftaran pengguna, login, manajemen film, hingga pencatatan peminjaman.

## ✨ Fitur
- **Registrasi & Login Pengguna**  
  Pengguna baru bisa mendaftar, dan pengguna lama bisa login untuk mengakses sistem.
- **Manajemen Data Film**  
  Tambah, edit, hapus, dan lihat daftar film yang tersedia.
- **Peminjaman Film**  
  Catat transaksi peminjaman oleh anggota.
- **Dashboard Admin**  
  Tampilan ringkasan data dan kontrol admin.
- **Tema Responsif**  
  Menggunakan tema dari folder `themes/fobia` agar tampilan menarik di semua perangkat.

## 📂 Struktur Folder
- `anggota/` → Modul untuk manajemen data anggota.
- `buku/` → Modul tambahan (opsional).
- `controllers/` → Pengendali logika tiap fitur.
- `dashboard/` → Halaman dashboard.
- `db/` → File & konfigurasi database.
- `film/` → Modul manajemen data film.
- `lib/` → Library atau helper tambahan.
- `matakuliah/` → Modul tambahan (mungkin dari versi lama).
- `models/` → Model untuk menghubungkan PHP dengan database.
- `pinjam/` → Modul transaksi peminjaman.
- `themes/fobia/` → Template tampilan website.
- `vendor/` → Dependensi pihak ketiga (Composer).

## 📄 File Utama
- `.env` → Konfigurasi environment (database, dll.).
- `.htaccess` → Pengaturan URL rewriting.
- `composer.json` & `composer.lock` → File konfigurasi Composer.
- `index.php` → Halaman utama aplikasi.
- `login.php` → Form login pengguna.
- `logout.php` → Proses logout.
- `register.php` → Form registrasi akun.
- `mulai.sql` & `mulai (2).sql` → Skrip SQL untuk membuat database.

## 🛠️ Teknologi yang Digunakan
- **PHP** – Backend dan logic aplikasi
- **JavaScript** – Interaksi frontend
- **CSS** – Tampilan website
- **Hack** – Beberapa bagian sintaks (minor)
- **Composer** – Manajemen dependensi PHP

## 🚀 Cara Menjalankan
1. Clone repository ini:
   ```bash
   git clone https://github.com/username/sewa_film.git

# Google Login dengan PHP Native

Proyek ini adalah tugas UTS Web Service App untuk implementasi login menggunakan akun Google melalui OAuth 2.0 dengan PHP native. Proyek ini memanfaatkan Composer untuk mengelola dependensi, khususnya library `google/apiclient`.

## 🛠️ Prasyarat

Sebelum menjalankan proyek ini, pastikan:

- PHP 7.4 atau lebih baru telah terinstall
- Composer sudah terinstall (https://getcomposer.org/)
- Web server lokal seperti Apache (XAMPP, Laragon, atau sejenisnya)
- Akses ke Google Cloud Console untuk mendapatkan Client ID dan Secret

## 🚀 Cara Menjalankan Proyek

### 1. Clone atau Ekstrak Proyek

Jika Anda memiliki file ZIP:

- Ekstrak file ZIP ke dalam folder server lokal Anda, misalnya:
  - `C:/xampp/htdocs/google-login` (untuk XAMPP)
  - `C:/laragon/www/google-login` (untuk Laragon)

### 2. Install Dependensi dengan Composer

Buka terminal dan masuk ke direktori proyek, lalu jalankan:

```bash
composer install
```

### 3. Konfigurasi Google OAuth 2.0

1. Buka [Google Cloud Console](https://console.cloud.google.com/)
2. Buat proyek baru atau gunakan proyek yang ada
3. Aktifkan **OAuth 2.0 Client ID** di bagian **APIs & Services > Credentials**
4. Buat OAuth client dengan:
   - **Application Type**: Web application
   - **Authorized redirect URIs**:  
     Contoh: `http://localhost/google-login/callback.php`
5. Simpan **Client ID** dan **Client Secret**

### 4. Konfigurasi File `config.php`

Buka file `config.php`, lalu masukkan kredensial Anda:

```php
<?php
define('GOOGLE_CLIENT_ID', 'ISI_DENGAN_CLIENT_ID_ANDA');
define('GOOGLE_CLIENT_SECRET', 'ISI_DENGAN_CLIENT_SECRET_ANDA');
define('GOOGLE_REDIRECT_URI', 'http://localhost/google-login/callback.php');
?>
```

### 5. Jalankan Aplikasi

Akses folder proyek melalui browser, contohnya:

```
http://localhost/google-login
```

Klik tombol **Login dengan Google** dan Anda akan diarahkan ke proses login menggunakan akun Google Anda.

## 🌍 Menjadikan Aplikasi Bisa Diakses Orang Lain

Jika Anda ingin agar orang lain dapat mengakses web Anda:

1. **Deploy ke Hosting / VPS**

   - Upload seluruh isi proyek ke public_html (cPanel) atau direktori root server.
   - Pastikan Anda mengatur `GOOGLE_REDIRECT_URI` sesuai domain Anda, contoh:
     ```
     https://namadomainanda.com/callback.php
     ```

2. **Update Redirect URI di Google Console**

   - Tambahkan URI redirect baru yang sesuai domain hosting Anda.

3. **Pastikan HTTPS Aktif**
   - Google OAuth hanya mengizinkan callback dari domain dengan HTTPS untuk keamanan.

## 🧩 Library yang Digunakan

- [`google/apiclient`](https://github.com/googleapis/google-api-php-client)

## 📄 Lisensi

Proyek ini bebas digunakan untuk keperluan pembelajaran mata kuliah Web Service App demi menyelesaikan studi Sistem Informasi di Universitas Singaperbangsa Karawang

MUHAMMAD RIZKY SAPUTRA
2210631250021
6B SISTEM INFORMASI

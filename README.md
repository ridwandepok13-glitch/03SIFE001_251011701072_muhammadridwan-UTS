# UTS - Toko Alat Musik (Laravel)

Starter source code untuk tugas Laravel tema **Toko Alat Musik**.

## 1. Buat project Laravel
Pastikan PHP, Composer, dan MySQL sudah terpasang. Jalankan:

```bash
composer create-project laravel/laravel UTS_NIM
```

Salin folder/file dari arsip ini ke project Laravel tersebut (gabungkan sesuai struktur folder).

## 2. Buat database
Buat database MySQL bernama `db_uts_nim`, lalu sesuaikan `.env`:

```env
DB_DATABASE=db_uts_nim
DB_USERNAME=root
DB_PASSWORD=
```

## 3. Jalankan aplikasi
Dari folder `UTS_NIM`:

```bash
php artisan migrate:fresh --seed
php artisan serve
```

Buka `http://127.0.0.1:8000`.

## Fitur
- Daftar alat musik dalam tampilan Bootstrap card/grid
- Halaman detail produk
- Navigasi beranda dan daftar produk
- Migration dan seeder data dummy
- Gambar lokal di `public/assets/images/`

## Catatan
Folder `vendor/` dan kerangka inti Laravel tidak disertakan. Buat project Laravel terlebih dahulu dengan Composer, lalu salin file starter ini.

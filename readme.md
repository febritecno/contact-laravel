<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Set Up
1. clone
   Buka terminal lalu masukan peritah
   ~~~~
   git clone https://github.com/febritecno/contact-laravel.git
   ~~~~
   
2. Setelah proses clone selesai masukkan perintah dibawah ini
   ~~~~
   composer install
   ~~~~
    
3. Masukan perintah dibawah ini untuk membuat file .env dari file .env.example 
   ~~~~
   mv .env.example .env
   ~~~~
   
4. setting database pada file .env
    ~~~~
    DB_DATABASE=nama_database
    DB_USERNAME=root
    DB_PASSWORD=
    ~~~~
    
5. Masukkan perintah `php artisan key:generate` untuk membuat app_key pada file .env
    
6. Masukkan perintah `php artisan migrate` untuk mengeksekusi file migration.

## Test input data (Contact & Groups)

1. Masukkan perintah `php artisan db:seed` untuk membuat default record pada tabel.

instalasi:
1. git clone [link] [nama folder baru]
2. cd [nama folder] >> masuk ke folder yang udah dibuat
3. composer install
4. buka file .env.example
5. ctrl+A >> ctrl+C >> ctrl+N >> ctrl+V 
6. simpan sebagai .env
7. buat database baru
8. edit file.env
edit sebelah sini:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[nama database]
DB_USERNAME=root
DB_PASSWORD=
9. php artisan migrate
10. php artisan key:generate
11. php artisan db:seed
12. php artisan serve



custom:
1. buat crud
php artisan crudmaker:new [nama table] --ui --migration --schema="[nama field]:[type data]"
2. ganti menu samping
resources\views\vendor\cms\dashboard\panel.blade.php
3. masukin template
copy yang dibawah :
@extends('cms::layouts.dashboard')

@section('pageTitle') [judul halaman] @stop //optional

@section('content')
[isi konten]
@stop

4. nambah nampilin data di tampilan tabel
resources\views\[nama table]s\index.blade.php
tinggal edit <th> </th> sama nambah <td></td> 

5. kalo perlu package cari di googlenya
laravel [nama package]
*) soal cara pake packagenya biasanya ada dokumentasinya

6. edit halaman awal "/"
lokasinya : resources\themes\default\pages\home.blade.php

7. custom form
lokasinya : resources\views\[nama table]s\create.blade.php

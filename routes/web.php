<?php

use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('front.home');
});

// contoh routing untuk mengarahkan ke view, tanpa melalui controller
Route::get('/percobaan_pertama', function () {
    return view('hello');
});

// contoh routing yang mengarahkan ke dirinya sendiri, tanpa view ataupun controller
Route::get('/salam', function () {
    return 'Selamat pagi peserta MSIB';
});

// contoh routing menggunakan parameter
Route::get('/salam/{nama}/{divisi}', function ($nama, $divisi) {
    return 'Nama Pegawai: '.$nama.'<br>departemen: '.$divisi;
});

Route::get('/daftar_nilai', function () {
    // return view yang mengarahkan ke dalam view yang didalamnya ada folder nilai dan file daftar_nilai
    return view('nilai.daftar_nilai');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// prefix and grouping adalah mengelompokkan routing ke satu jenis route
Route::prefix('admin')->group(function () {
    // route memanggil controller setiap fungsi,
    // (nanti linknya menggunakn url, ada didalam view)
    // jika membuat pertabel menggunakan get, jika hanya 1 tabel menggunakan resource
    Route::get('/jenis_produk', [JenisProdukController::class, 'index']); // menggunakan query builder
    Route::post('/jenis_produk/store', [JenisProdukController::class, 'store']); // menggunakan query builder
    Route::get('/kartu', [KartuController::class, 'index']);

    // route menggunakan nama class
    Route::resource('produk', ProdukController::class); // menggunakan eloquent
    Route::resource('pelanggan', PelangganController::class); // menggunakan eloquent
});

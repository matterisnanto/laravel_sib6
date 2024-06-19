<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\KartuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function(){
//     return view('front.home');
// });
Route::get('/', [BerandaController::class, 'index']);
Route::get('add-to-cart/{id}', [BerandaController::class, 'addToCart'])->name('add.to.cart');
Route::get('detail/{id}', [BerandaController::class, 'detail'])->name('detail.produk');
Route::get('/shop_cart', [BerandaController::class, 'cart'])->name('shopcart.produk');
Route::patch('/update-cart', [BerandaController::class, 'update'])->name('update.cart');
Route::patch('/remove-cart', [BerandaController::class, 'remove'])->name('remove.from.cart');
// contoh routing untuk mengarahkan ke view, tanpa melalui controller
Route::get('/percobaan_pertama', function () {
    return view('hello');
});
// contoh routing yang mengarahkan ke dirinya sendiri, tanpa view ataupun controller
Route::get('/salam', function () {
    return '<h1>Selamat Pagi Peserta MSIB</h1>';
});
// contoh routing yang menggunakan parameter
Route::get('/staff/{nama}/{divisi}', function ($nama, $divisi) {
    return 'Nama Pegawai '.$nama.'<br> Departemene: '.$divisi;
});
Route::get('/daftar_nilai', function () {
    // return view yang mengarahkan kedalam view yang didalamnya ada folder nilai dan file daftar_nilai
    return view('nilai.daftar_nilai');
});

Route::get('produkapi', [ProdukController::class, 'produkApi']);
Route::get('produkapi/{id}', [ProdukController::class, 'produkDetailApi']);
// Route::get('/dashboard', function(){
//     return view ('admin.dashboard');
// });
// middleware berguna sebagai pembatas atau validasi antara visitor yang
// sudah memiliki user akses dan belum memiliki akses
Route::group(['middleware' => ['auth', 'checkActive', 'role:admin|manager|staff']], function () {
    // prefix and grouping adalah mengelompokkan routing ke satu jenis route
    Route::prefix('admin')->group(function () {
        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/{user}/activate',
            [UserController::class, 'activate'])->name('admin.user.activate');
        Route::get('/profile', [UserController::class, 'showProfile']);
        Route::patch('profile/{id}', [UserController::class, 'update']);
        // patch atau put dua syntax yang sama untuk digunakan sebagai pengubah data
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // route by name adalah routing yang diberikan penamaan untuk kemudian dipanggil di link
        // route memanggil controller setiap fungsi,
        // (nanti linknya menggunakn url, ada didalam view)
        Route::get('/jenis_produk', [JenisProdukController::class, 'index']);
        Route::post('/jenis_produk/store', [JenisProdukController::class, 'store']);
        // route dengan pemanggilan class
        Route::resource('produk', ProdukController::class);
        Route::resource('pelanggan', PelangganController::class);

        Route::get('/kartu', [KartuController::class, 'index']);
        Route::post('/kartu/store', [KartuController::class, 'store']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

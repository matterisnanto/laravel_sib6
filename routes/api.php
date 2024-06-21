<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('produkapi', [ProdukController::class, 'index']);
    Route::get('produkapi/{id}', [ProdukController::class, 'detail']);
    Route::post('produk-create', [ProdukController::class, 'create']);
    Route::put('produk/{id}', [ProdukController::class, 'update']);
    Route::delete('produkdelete/{id}', [ProdukController::class, 'delete']);
});

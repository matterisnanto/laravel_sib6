<?php

use App\Http\Controllers\Api\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('produkapi', [ProdukController::class, 'index']);
Route::get('produkapi/{id}', [ProdukController::class, 'detail']);

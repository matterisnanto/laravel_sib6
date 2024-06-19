<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
            ->select('produk.*', 'jenis_produk.nama as jenis')
            ->get();

        return new ProdukResource(true, 'list data produk', $produk);
    }

    public function detail($id)
    {
        $produk = Produk::join('jenis_produk', 'jenis_produk_id', '=', 'jenis_produk.id')
        ->select('produk.*', 'jenis_produk.nama as jenis')
        ->where('produk.id', $id)
        ->get();
        if ($produk) {
            return new ProdukResource(true, 'detail data produk', $produk);
        } else {
            return response()->jscon([
                'success' => false,
                'message' => 'data tidak ditemukan',
            ], 404);
        }
    }
}

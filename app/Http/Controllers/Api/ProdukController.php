<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProdukResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function create(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:produk|max:10',
            'nama' => 'required|max:45',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'jenis_produk_id' => 'required|exists:jenis_produk,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $produk = Produk::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'min_stok' => $request->min_stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'jenis_produk_id' => $request->jenis_produk_id,
        ]);

        // Kembalikan response sukses
        return new ProdukResource(true, 'Data produk berhasil ditambahkan', $produk);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|max:10',
            'nama' => 'required|max:45',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'min_stok' => 'required|numeric',
            'jenis_produk_id' => 'required|exists:jenis_produk,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Buat produk baru
        $produk = Produk::whereId($id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'min_stok' => $request->min_stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $request->foto,
            'jenis_produk_id' => $request->jenis_produk_id,
        ]);

        // Kembalikan response sukses
        return new ProdukResource(true, 'Data produk berhasil diedit', $produk);
    }

    public function delete($id)
    {
        $produk = Produk::whereId($id)->first();
        $produk->delete();

        return new ProdukResource(true, 'Data produk berhasil dihapus', $produk);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Services\ProdukService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    protected $produkService;

    public function __construct(ProdukService $produkService)
    {
        $this->produkService = $produkService;
    }

    /**
     * Tampilkan Data (Read)
     */
    public function index()
    {
        $products = Produk::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar produk berhasil diambil',
            'data' => $products
        ], 200);
    }

    /**
     * Tambah Data (Create)
     * Includes Validation, Error Handling, and Service Refactor
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Error Handling & Service Call
        try {
            $product = $this->produkService->storeProduk($request->all());

            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan',
                'data' => $product
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Ubah Data (Update)
     */
    public function update(Request $request, $id)
    {
        $product = Produk::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui',
            'data' => $product
        ], 200);
    }

    /**
     * Hapus Data (Delete)
     */
    public function destroy($id)
    {
        $product = Produk::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus'
        ], 200);
    }
}

<?php

namespace App\Services;

use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class ProdukService
{
    /**
     * Store a new product.
     * 
     * @param array $data
     * @return Produk
     */
    public function storeProduk(array $data)
    {
        return DB::transaction(function () use ($data) {
            return Produk::create($data);
        });
    }
}

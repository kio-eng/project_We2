@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: 0 auto;">
    <a href="{{ route('produk.index') }}" style="display: inline-flex; align-items: center; color: var(--text-secondary); text-decoration: none; margin-bottom: 1.5rem; font-size: 0.875rem; font-weight: 500;">
        <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Daftar
    </a>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.25rem;">Edit Produk</h2>
                <p style="color: var(--text-secondary); font-size: 0.875rem;">Perbarui informasi produk <strong>{{ $product->nama }}</strong>.</p>
            </div>
            <div style="background: #e0e7ff; color: #4338ca; padding: 0.375rem 0.75rem; border-radius: 8px; font-size: 0.75rem; font-weight: 600;">
                ID: #{{ $product->id }}
            </div>
        </div>

        <form action="{{ route('produk.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Contoh: Laptop Pro M1" value="{{ old('nama', $product->nama) }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="0" value="{{ old('harga', $product->harga) }}" required>
            </div>

            <div class="form-group">
                <label for="stok">Jumlah Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" placeholder="0" value="{{ old('stok', $product->stok) }}" required>
            </div>

            <div style="margin-top: 2.5rem; display: flex; gap: 1rem;">
                <button type="submit" class="btn btn-primary" style="flex: 1; justify-content: center; padding: 0.875rem;">
                    Perbarui Produk
                </button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary" style="justify-content: center; padding: 0.875rem;">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

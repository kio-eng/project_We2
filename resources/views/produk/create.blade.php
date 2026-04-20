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
        <h2 style="font-size: 1.25rem; font-weight: 700; margin-bottom: 0.5rem;">Tambah Produk Baru</h2>
        <p style="color: var(--text-secondary); font-size: 0.875rem; margin-bottom: 2rem;">Masukkan detail produk di bawah ini.</p>

        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Produk</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Contoh: Laptop Pro M1" value="{{ old('nama') }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="0" value="{{ old('harga') }}" required>
            </div>

            <div class="form-group">
                <label for="stok">Jumlah Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" placeholder="0" value="{{ old('stok') }}" required>
            </div>

            <div style="margin-top: 2.5rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 0.875rem;">
                    Simpan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

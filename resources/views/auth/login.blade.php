@extends('layouts.app')

@section('content')
<div class="card" style="max-width: 400px; margin: 0 auto; padding: 2.5rem;">
    <div style="text-align: center; margin-bottom: 2rem;">
        <h2 style="font-size: 1.5rem; font-weight: 700;">Login</h2>
        <p style="color: var(--text-secondary); font-size: 0.875rem;">Masuk ke akun Anda untuk melanjutkan</p>
    </div>

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 1.5rem;">
            <input type="checkbox" id="remember" name="remember" style="width: 1rem; height: 1rem; cursor: pointer; border-radius: 4px;">
            <label for="remember" style="margin-bottom: 0; font-size: 0.875rem; font-weight: normal; cursor: pointer;">Ingat Saya</label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 0.75rem;">
            Masuk
        </button>
    </form>
</div>
@endsection

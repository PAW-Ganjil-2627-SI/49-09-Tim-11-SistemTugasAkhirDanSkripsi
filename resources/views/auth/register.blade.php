@extends('auth.layout')
@section('title', 'Register')
@section('heading', 'Daftar Akun')

@section('content')
<form method="POST" action="/register">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
    @error('name') <div class="error">{{ $message }}</div> @enderror

    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
    @error('email') <div class="error">{{ $message }}</div> @enderror

    <label>Password</label>
    <input type="password" name="password" placeholder="Minimal 6 karakter" required>
    @error('password') <div class="error">{{ $message }}</div> @enderror

    <label>Konfirmasi Password</label>
    <input type="password" name="password_confirmation" placeholder="Ulangi password" required>

    <button type="submit">Daftar</button>
</form>
<p class="link">Sudah punya akun? <a href="/login">Login</a></p>
@endsection
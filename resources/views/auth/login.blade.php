@extends('auth.layout')
@section('title', 'Login')
@section('heading', 'Login Sistem Tugas Akhir')

@section('content')
<form method="POST" action="/login">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
    @error('email') <div class="error">{{ $message }}</div> @enderror

    <label>Password</label>
    <input type="password" name="password" placeholder="Masukkan password" required>
    @error('password') <div class="error">{{ $message }}</div> @enderror

    <button type="submit">Masuk</button>
</form>
<p class="link">Belum punya akun? <a href="/register">Daftar</a></p>
@endsection
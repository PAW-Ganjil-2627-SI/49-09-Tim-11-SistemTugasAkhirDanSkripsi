@extends('layouts.mahasiswa')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h1 class="page-title">Edit Data Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <h2>Ubah Data</h2>

        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>

            <label for="nama">Nama Mahasiswa</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>

            <label for="angkatan">Angkatan</label>
            <input type="number" id="angkatan" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan) }}" required>

            <label for="sks_lulus">SKS Lulus</label>
            <input type="number" id="sks_lulus" name="sks_lulus" value="{{ old('sks_lulus', $mahasiswa->sks_lulus) }}" required>

            <label for="status">Status Keaktifan</label>
            <select id="status" name="status" required>
                @foreach (['Aktif', 'Cuti', 'Non-Aktif'] as $s)
                    <option value="{{ $s }}" @selected(old('status', $mahasiswa->status) === $s)>{{ $s }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn-primary">Simpan Perubahan</button>
            <a href="{{ route('mahasiswa.index') }}" class="link-batal">Batal</a>
        </form>
    </div>
@endsection

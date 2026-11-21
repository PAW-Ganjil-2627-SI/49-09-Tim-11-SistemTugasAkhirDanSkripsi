@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
    <h2>Edit Data Dosen</h2>

    <form action="{{ route('dosen.update', $dosen) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nidn" value="{{ old('nidn', $dosen->nidn) }}" maxlength="13" required>
        <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" required>
        <select name="jabatan" required>
            @foreach ($daftarJabatan as $j)
                <option value="{{ $j }}" @selected(old('jabatan', $dosen->jabatan) == $j)>{{ $j }}</option>
            @endforeach
        </select>
        <input type="text" name="kepakaran" value="{{ old('kepakaran', $dosen->kepakaran) }}" required>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('dosen.index') }}"><button type="button">Batal</button></a>
    </form>
@endsection
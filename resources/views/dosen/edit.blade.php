@extends('layouts.dosen')

@section('title', 'Edit Dosen')

@section('content')
    <h2>Edit Data Dosen</h2>

    <form action="{{ route('dosen.update', $dosen->id) }}" method="POST" class="form-edit">
        @csrf @method('PUT')
        <label>NIDN</label>
        <input type="text" name="nidn" value="{{ old('nidn', $dosen->nidn) }}" maxlength="13" required>
        <label>Nama Dosen</label>
        <input type="text" name="nama" value="{{ old('nama', $dosen->nama) }}" required>
        <label>Jabatan Fungsional</label>
        <select name="jabatan" required>
            @foreach ($daftarJabatan as $j)
                <option value="{{ $j }}" @selected(old('jabatan', $dosen->jabatan) == $j)>{{ $j }}</option>
            @endforeach
        </select>
        <label>Kepakaran Riset</label>
        <input type="text" name="kepakaran" value="{{ old('kepakaran', $dosen->kepakaran) }}" required>
        <div style="display:flex;gap:10px">
            <button type="submit">Perbarui</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-ghost">Batal</a>
        </div>
    </form>
@endsection

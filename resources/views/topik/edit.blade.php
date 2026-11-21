@extends('layouts.app')

@section('title', 'Edit Topik')

@section('content')
    <h1>Edit Topik</h1>

    @if ($errors->any())
        <div class="form" style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form">
        <form action="{{ route('topik.update', $topik->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label><b>Nama Topik</b></label>
            <input type="text" name="nama_topik" value="{{ old('nama_topik', $topik->nama_topik) }}" required>

            <label><b>Bidang Ilmu</b></label>
            <select name="bidang_ilmu" required>
                @foreach ($daftarBidang as $bidang)
                    <option value="{{ $bidang }}" {{ old('bidang_ilmu', $topik->bidang_ilmu) == $bidang ? 'selected' : '' }}>
                        {{ $bidang }}
                    </option>
                @endforeach
            </select>

            <label><b>Kata Kunci</b></label>
            <input type="text" name="kata_kunci" value="{{ old('kata_kunci', $topik->kata_kunci) }}" required>

            <label><b>Deskripsi Fokus</b></label>
            <textarea name="deskripsi" required>{{ old('deskripsi', $topik->deskripsi) }}</textarea>

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('topik.index') }}">Batal</a>
        </form>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Topik dan Bidang Minat')

@section('content')
    <h1>Data Topik dan Bidang Minat</h1>

    @if (session('pesan'))
        <div class="alert alert-success">{{ session('pesan') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form">
        <h2>Tambah Topik</h2>

        <form action="{{ route('topik.store') }}" method="POST">
            @csrf

            <label>Nama Topik</label>
            <input type="text" name="nama_topik" value="{{ old('nama_topik') }}" placeholder="Masukkan nama topik" required>

            <label>Bidang Ilmu</label>
            <select name="bidang_ilmu" required>
                <option value="">Pilih bidang ilmu</option>
                @foreach ($daftarBidang as $bidang)
                    <option value="{{ $bidang }}" {{ old('bidang_ilmu') == $bidang ? 'selected' : '' }}>
                        {{ $bidang }}
                    </option>
                @endforeach
            </select>

            <label>Kata Kunci</label>
            <input type="text" name="kata_kunci" value="{{ old('kata_kunci') }}" placeholder="Contoh: Database, AI" required>

            <label>Deskripsi Fokus</label>
            <textarea name="deskripsi" placeholder="Masukkan deskripsi" required>{{ old('deskripsi') }}</textarea>

            <button type="submit">Simpan</button>
        </form>
    </div>

    <h2>Daftar Topik</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Topik</th>
                <th>Bidang Ilmu</th>
                <th>Kata Kunci</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($topik as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->nama_topik }}</td>
                    <td>{{ $row->bidang_ilmu }}</td>
                    <td>{{ $row->kata_kunci }}</td>
                    <td>{{ $row->deskripsi }}</td>
                    <td>
                        <div class="aksi">
                            <a href="{{ route('topik.edit', $row->id) }}">Edit</a>

                            <form action="{{ route('topik.destroy', $row->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus topik ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="empty">Belum ada topik.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
    <h1 class="page-title">Data Mahasiswa</h1>

    @if (session('success'))
        <div class="alert alert-ok">{{ session('success') }}</div>
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

    <div class="card">
        <h2>Tambah Mahasiswa</h2>

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM" required>

            <label for="nama">Nama Mahasiswa</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama" required>

            <label for="angkatan">Angkatan</label>
            <input type="number" id="angkatan" name="angkatan" value="{{ old('angkatan') }}" placeholder="Contoh: 2023" required>

            <label for="sks_lulus">SKS Lulus</label>
            <input type="number" id="sks_lulus" name="sks_lulus" value="{{ old('sks_lulus') }}" placeholder="Contoh: 120" required>

            <label for="status">Status Keaktifan</label>
            <select id="status" name="status" required>
                @foreach (['Aktif', 'Cuti', 'Non-Aktif'] as $s)
                    <option value="{{ $s }}" @selected(old('status') === $s)>{{ $s }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>

    <h2 class="section-title">Daftar Mahasiswa</h2>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>SKS Lulus</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mahasiswas as $m)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $m->nim }}</td>
                        <td class="nama">{{ $m->nama }}</td>
                        <td>{{ $m->angkatan }}</td>
                        <td>{{ $m->sks_lulus }}</td>
                        <td>
                            <span class="badge {{ $m->status === 'Aktif' ? 'badge-aktif' : 'badge-lain' }}">{{ $m->status }}</span>
                        </td>
                        <td>
                            <div class="aksi">
                                <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn-aksi btn-edit">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-aksi btn-hapus">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="kosong">Belum ada data mahasiswa.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
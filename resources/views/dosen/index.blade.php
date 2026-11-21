@extends('layouts.app')

@section('title', 'Modul Dosen')

@section('content')
    <h2>Data Dosen Pembimbing</h2>

    <form action="{{ route('dosen.store') }}" method="POST">
        @csrf
        <input type="text" name="nidn" value="{{ old('nidn') }}" placeholder="NIDN (13 Digit)" maxlength="13" required>
        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama Dosen" required>
        <select name="jabatan" required>
            <option value="">-- Pilih Jabatan --</option>
            @foreach ($daftarJabatan as $j)
                <option value="{{ $j }}" @selected(old('jabatan') == $j)>{{ $j }}</option>
            @endforeach
        </select>
        <input type="text" name="kepakaran" value="{{ old('kepakaran') }}" placeholder="Kepakaran Riset" required>
        <button type="submit">Simpan</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>NIDN</th>
            <th>Nama Dosen</th>
            <th>Jabatan Fungsional</th>
            <th>Kepakaran Riset</th>
            <th>Aksi</th>
        </tr>

        @forelse ($dosen as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->nidn }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->jabatan }}</td>
                <td>{{ $row->kepakaran }}</td>
                <td>
                    <a href="{{ route('dosen.edit', $row) }}"><button type="button">Edit</button></a>

                    <form action="{{ route('dosen.destroy', $row) }}" method="POST" style="display:inline;"
                          onsubmit="return confirm('Yakin mau hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data dosen.</td>
            </tr>
        @endforelse
    </table>
@endsection
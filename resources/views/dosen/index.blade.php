@extends('layouts.dosen')

@section('title', 'Modul Dosen')

@section('content')
    <h2>Data Dosen Pembimbing</h2>

    <form action="{{ route('dosen.store') }}" method="POST" class="form-row">
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

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No</th><th>NIDN</th><th>Nama Dosen</th><th>Jabatan Fungsional</th><th>Kepakaran Riset</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dosens as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nidn }}</td>
                        <td><strong>{{ $d->nama }}</strong></td>
                        <td>{{ $d->jabatan }}</td>
                        <td><span class="badge">{{ $d->kepakaran }}</span></td>
                        <td class="aksi">
                            <a href="{{ route('dosen.edit', $d->id) }}" class="btn btn-sm btn-ghost">Edit</a>
                            <form action="{{ route('dosen.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty">Belum ada data dosen pembimbing.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

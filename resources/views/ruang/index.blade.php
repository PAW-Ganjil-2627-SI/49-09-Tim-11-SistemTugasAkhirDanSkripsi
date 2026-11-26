<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Ruang & Fasilitas Sidang</title>
  <link rel="stylesheet" href="{{ asset('css/ruang.css') }}">
</head>
<body>
  <header class="navbar">
    <div class="navbar-inner">
      <div class="brand">
        <div class="brand-logo">TA</div>
        <div class="brand-text">
          <div class="brand-title">Sistem Tugas Akhir</div>
          <div class="brand-sub">Ruang & Fasilitas Sidang</div>
        </div>
      </div>

      <nav class="nav-menu">
        <a href="{{ route('topik.index') }}">Topik</a>
        <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
        <a href="{{ route('dosen.index') }}">Dosen</a>
        <a href="{{ route('ruang.index') }}" class="active">Ruang</a>
      </nav>
    </div>
  </header>

  <main class="container">

  <h1>Data Ruang & Fasilitas Sidang</h1>

  @if (session('success'))
    <p style="text-align:center;color:#2E7D32;font-weight:600;">{{ session('success') }}</p>
  @endif

  <div class="toolbar">
    <a href="{{ route('ruang.create') }}" class="btn btn-primary">+ Tambah Ruang</a>

    <form class="search" method="GET" action="{{ route('ruang.index') }}">
      <input type="search" name="cari" value="{{ $cari ?? '' }}" placeholder="Cari ruang / gedung...">
      <button type="submit" class="btn btn-light">Cari</button>
      @if (!empty($cari))
        <a href="{{ route('ruang.index') }}" class="btn btn-light">Reset</a>
      @endif
    </form>
  </div>

  <div class="table-wrap">
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Ruang</th>
          <th>Gedung</th>
          <th>Proyektor</th>
          <th>PC</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($ruang as $r)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $r->nama_ruang }}</td>
            <td>{{ $r->gedung }}</td>
            <td>
              <span class="badge {{ $r->proyektor === 'Ada' ? 'badge-ada' : 'badge-tidak' }}">{{ $r->proyektor }}</span>
            </td>
            <td>
              <span class="badge {{ $r->pc === 'Ada' ? 'badge-ada' : 'badge-tidak' }}">{{ $r->pc }}</span>
            </td>
            <td>
              <a href="{{ route('ruang.edit', $r) }}" class="btn btn-sm btn-edit">Edit</a>
              <form method="POST" action="{{ route('ruang.destroy', $r) }}" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-hapus">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td class="empty" colspan="6">
              {{ !empty($cari) ? 'Tidak ada hasil untuk "'.$cari.'".' : 'Belum ada data.' }}
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  </main>
</body>
</html>
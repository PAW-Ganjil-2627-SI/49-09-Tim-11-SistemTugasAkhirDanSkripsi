<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Ruang Sidang</title>
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

  <h1>Edit Ruang Sidang</h1>

  <form class="form-box" method="POST" action="{{ url('/ruang/'.$ruang->id) }}">
    @csrf
    @method('PUT')
    @include('ruang._form')
  </form>

  </main>
</body>
</html>
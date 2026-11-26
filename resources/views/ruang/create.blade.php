<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tambah Ruang Sidang</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    </div>
  </header>

  <main class="container">

  <h1>Tambah Ruang Sidang</h1>

  <form class="form-box" method="POST" action="{{ url('/ruang') }}">
    @csrf
    @include('ruang._form')
  </form>

  </main>
</body>
</html>
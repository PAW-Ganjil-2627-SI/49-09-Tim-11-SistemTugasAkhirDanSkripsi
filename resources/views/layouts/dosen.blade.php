<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Tugas Akhir')</title>
    <link rel="stylesheet" href="{{ asset('css/dosen.css') }}">
    <style>
        .nav-bar-simple {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .nav-bar-simple a {
            text-decoration: none;
            color: #8a6a50;
            font-weight: 600;
            font-size: 13px;
            margin-left: 14px;
        }
        .nav-bar-simple a:hover, .nav-bar-simple a.active {
            color: #d4651e;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <div class="nav-bar-simple">
            <div class="brand"><div class="logo">TA</div></div>
            <div>
                <a href="{{ route('topik.index') }}">Topik</a>
                <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                <a href="{{ route('dosen.index') }}" class="active">Dosen</a>
                <a href="{{ route('ruang.index') }}">Ruang</a>
            </div>
        </div>
        <div class="card">
            @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
            @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
            @yield('content')
        </div>
    </div>
</body>
</html>
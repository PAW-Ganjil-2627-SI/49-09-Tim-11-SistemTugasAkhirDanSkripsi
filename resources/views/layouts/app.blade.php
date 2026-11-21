<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Tugas Akhir')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrap">
        <div class="brand"><div class="logo">TA</div></div>
        <div class="card">
            @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
            @if($errors->any())<div class="error">{{ $errors->first() }}</div>@endif
            @yield('content')
        </div>
    </div>
</body>
</html>
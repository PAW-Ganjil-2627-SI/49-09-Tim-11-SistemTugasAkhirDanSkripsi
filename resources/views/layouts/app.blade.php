<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="navbar-inner">
            <a href="/topik" class="nav-brand">
                <span class="logo">TA</span>
                <div>
                    <strong>Sistem Tugas Akhir</strong>
                    <small>Topik &amp; Bidang Minat</small>
                </div>
            </a>

            @auth
            <div class="nav-user">
                <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                <span class="nav-name">{{ auth()->user()->name }}</span>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            </div>
            @endauth
        </div>
    </header>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>
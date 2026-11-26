<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Tugas Akhir')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .nav-links {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-left: 24px;
        }
        .nav-link {
            text-decoration: none;
            color: var(--muted);
            font-weight: 600;
            font-size: 14px;
            padding: 6px 12px;
            border-radius: 8px;
            transition: all .2s;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            background: var(--primary-50);
        }
        .nav-left {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

    <header class="navbar">
        <div class="navbar-inner">
            <div class="nav-left">
                <a href="{{ route('topik.index') }}" class="nav-brand">
                    <span class="logo">TA</span>
                    <div>
                        <strong>Sistem Tugas Akhir</strong>
                        <small>Portal Akademik SI</small>
                    </div>
                </a>

                @auth
                <nav class="nav-links">
                    <a href="{{ route('topik.index') }}" class="nav-link {{ request()->routeIs('topik.*') ? 'active' : '' }}">Topik &amp; Minat</a>
                    <a href="{{ route('mahasiswa.index') }}" class="nav-link {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">Data Mahasiswa</a>
                    <a href="{{ route('dosen.index') }}" class="nav-link {{ request()->routeIs('dosen.*') ? 'active' : '' }}">Dosen Pembimbing</a>
                    <a href="{{ route('ruang.index') }}" class="nav-link {{ request()->routeIs('ruang.*') ? 'active' : '' }}">Ruang Sidang</a>
                </nav>
                @endauth
            </div>

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

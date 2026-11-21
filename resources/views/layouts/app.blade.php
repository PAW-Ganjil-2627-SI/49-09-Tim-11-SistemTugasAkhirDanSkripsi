<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Data Mahasiswa')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --krem: #FEF3E2;
            --emas: #F4AE52;
            --oranye: #D4621A;
            --gelap: #2A1A0E;
            --garis: #F1E2C8;
            --teks-pudar: #8a7560;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--gelap);
            background: linear-gradient(180deg, #FFF6E8 0%, var(--krem) 100%);
            min-height: 100vh;
        }

        /* Navbar */
        .navbar { background: #fffdf9; border-bottom: 1px solid var(--garis); }
        .navbar-inner {
            max-width: 740px; margin: 0 auto; padding: 8px 16px;
            display: flex; align-items: center; gap: 10px;
        }
        .logo {
            width: 28px; height: 28px; border-radius: 8px;
            background: linear-gradient(135deg, var(--emas), var(--oranye));
            color: #fff; font-weight: 800; font-size: 11px;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 3px 8px rgba(212, 98, 26, .25);
        }
        .brand-title { font-size: 12px; font-weight: 700; line-height: 1.2; }
        .brand-sub { font-size: 10px; color: var(--teks-pudar); }

        /* Layout */
        .container { max-width: 740px; margin: 0 auto; padding: 32px 16px 60px; }
        .page-title { text-align: center; font-size: 26px; font-weight: 800; margin: 0; }
        .page-title::after {
            content: ""; display: block; width: 40px; height: 3px; border-radius: 2px;
            margin: 12px auto 28px;
            background: linear-gradient(90deg, var(--emas), var(--oranye));
        }
        .section-title { font-size: 16px; font-weight: 700; margin: 36px 0 12px; }

        /* Kartu */
        .card {
            position: relative; background: #fff; border-radius: 16px;
            padding: 26px 24px 24px; max-width: 520px; margin: 0 auto;
            box-shadow: 0 10px 30px rgba(212, 98, 26, .10);
            overflow: hidden;
        }
        .card::before {
            content: ""; position: absolute; top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, var(--emas), var(--oranye));
        }
        .card h2 { margin: 0 0 18px; font-size: 17px; font-weight: 700; }

        /* Form */
        label { display: block; font-size: 11px; font-weight: 600; margin: 14px 0 6px; }
        input, select, textarea {
            width: 100%; padding: 11px 12px; font: inherit; font-size: 12px;
            color: var(--gelap); background: #FFFDF9;
            border: 1px solid var(--garis); border-radius: 10px; outline: none;
            transition: border-color .15s, box-shadow .15s;
        }
        input::placeholder { color: #b9a58f; }
        input:focus, select:focus, textarea:focus {
            border-color: var(--emas); box-shadow: 0 0 0 3px rgba(244, 174, 82, .25);
        }
        .btn-primary {
            display: block; width: 100%; margin-top: 22px; padding: 12px;
            font: inherit; font-size: 12px; font-weight: 700; color: #fff;
            background: var(--oranye); border: 0; border-radius: 10px; cursor: pointer;
            box-shadow: 0 8px 18px rgba(212, 98, 26, .30);
            transition: filter .15s;
        }
        .btn-primary:hover { filter: brightness(1.08); }
        .link-batal {
            display: block; text-align: center; margin-top: 14px;
            font-size: 12px; color: var(--teks-pudar); text-decoration: none;
        }
        .link-batal:hover { color: var(--oranye); }

        /* Tabel */
        .table-wrap {
            background: #fff; border: 1px solid var(--garis); border-radius: 14px;
            overflow-x: auto; box-shadow: 0 8px 24px rgba(212, 98, 26, .08);
        }
        table { width: 100%; border-collapse: collapse; font-size: 11px; }
        thead th {
            background: #FBEBD0; text-align: left; padding: 14px 12px;
            font-size: 9px; font-weight: 700; letter-spacing: .06em;
            text-transform: uppercase; color: #6b4a2e; white-space: nowrap;
        }
        tbody td { padding: 15px 12px; border-top: 1px solid var(--garis); vertical-align: middle; }
        tbody td.nama { font-weight: 700; }
        .kosong { text-align: center; color: var(--teks-pudar); padding: 28px 12px; }
        .aksi { display: flex; gap: 8px; align-items: center; }
        .aksi form { margin: 0; }
        .btn-aksi {
            display: inline-block; padding: 6px 12px; font: inherit; font-size: 10px; font-weight: 600;
            border-radius: 8px; cursor: pointer; text-decoration: none; line-height: 1.2;
        }
        .btn-edit { color: var(--oranye); background: #FEF3E2; border: 1px solid #F8DDB4; }
        .btn-hapus { color: #d63a3a; background: #FFE9E9; border: 1px solid #F8C9C9; }
        .btn-edit:hover { background: #FBE3BF; }
        .btn-hapus:hover { background: #FFD9D9; }

        /* Badge status */
        .badge { display: inline-block; padding: 3px 9px; border-radius: 99px; font-size: 10px; font-weight: 600; }
        .badge-aktif { background: #E6F5EA; color: #217a3c; }
        .badge-lain { background: #FBEBD0; color: #8a5a22; }

        /* Notifikasi */
        .alert { max-width: 520px; margin: 0 auto 16px; padding: 11px 14px; border-radius: 10px; font-size: 12px; }
        .alert-ok { background: #E6F5EA; color: #217a3c; border: 1px solid #C5E6CF; }
        .alert-error { background: #FFE9E9; color: #b23030; border: 1px solid #F8C9C9; }
        .alert ul { margin: 0; padding-left: 18px; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <div class="logo">TA</div>
            <div>
                <div class="brand-title">Sistem Tugas Akhir</div>
                <div class="brand-sub">Data Mahasiswa</div>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>
</body>
</html> 
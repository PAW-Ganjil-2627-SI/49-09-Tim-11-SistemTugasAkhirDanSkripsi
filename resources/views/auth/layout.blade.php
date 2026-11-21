<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth-page">

    <div class="auth-wrap">
        <div class="auth-box">
            <div class="logo">TA</div>

            <div class="card">
                <h2>@yield('heading')</h2>
                @yield('content')
            </div>
        </div>
    </div>

</body>
</html>
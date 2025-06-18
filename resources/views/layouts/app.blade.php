<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/soul.ico') }}">
    <title>@yield('title', 'PokeDash')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/znoteacc.css') }}">
    @yield('head')
</head>
<body>
    @include('layouts.header')
    <div class="container">
        <div class="site-wrapper">
            <main class="content-area">
                @yield('content')
            </main>
            <aside class="znote-sidebar">
                @include('layouts.aside')
            </aside>
        </div>
    </div>
    @include('layouts.footer')
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>

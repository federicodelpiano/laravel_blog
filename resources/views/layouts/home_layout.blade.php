<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
    <header class="site-heading">  
        @include('layouts.navbar')

        <div class="container site-heading__title-container">
            <h1 class="site-heading__title-container__title text-center">Laravel Blog</h1>
            <h2 class="site-heading__title-container__subtitle text-center">Blog App by Federico Del Piano</h2>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @yield('scripts')
</body>
</html>

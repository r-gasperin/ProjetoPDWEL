<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Biblioteca - @yield('page_title')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    @include('partials.header')
    <main role="main">
        <div class="row">
            <div class="column-start"><h1>@yield('page_title')</h1></div>
            <div class="column-end">@yield('add_link')</div>
        </div>
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>

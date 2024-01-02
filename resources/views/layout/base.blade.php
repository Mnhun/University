<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('bootstrap.css')}}">

    <title>@yield('title')</title>
</head>
<body>
    <header>
        @include('layout.header')
    </header>
    <main>
        @yield('main')
    </main>
    <footer>
        @include('layout.footer')
    </footer>
    
</body>
</html>
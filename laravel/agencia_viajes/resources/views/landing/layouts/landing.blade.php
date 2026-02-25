<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    @include('_partials.header')
    <main>
        @yield('content')
    </main>
    @include('_partials.footer')
</body>

</html>

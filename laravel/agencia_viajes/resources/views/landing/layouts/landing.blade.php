<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
</head>

<body>
    @include('_partials.header')
    <main>
        @yield('content')
    </main>
    @include('_partials.footer')
</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Outros links e scripts -->
    @yield('head')
</head>
<body>
    @yield('content')

    <!-- Scripts -->
    @yield('scripts')
</body>
</html>

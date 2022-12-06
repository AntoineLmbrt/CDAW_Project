<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Pokemon Web Site</title>
        @yield('style')
    </head>
    <style>
        body {
            background: rgba(12, 28, 62, 1);
        }
    </style>
    <body >
        @include('components.navbar')
        @yield('template')
        <h1 style="color: azure">Hello World</h1>
        @include('components.footer')
    </body>
    @yield('script')

</html>

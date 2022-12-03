<!-- Voici le template situé dans resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

    @yield('sidebar')

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
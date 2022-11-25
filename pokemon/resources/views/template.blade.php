<!doctype html>
<html>
    <head>
        <title>APP POKEMON</title>

        <link rel="stylesheet" href = "//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

         @yield('style')
    </head>
    <body>
        <header>
            <p>LISTE DES POKEMONS</p>
        </header>
        
        <div class="content">
            @yield('content')
        </div>


        <footer>
            <p>DE ANTOINE LAMBERT</p>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            @yield('script')
        </footer>
    </body>
</html>
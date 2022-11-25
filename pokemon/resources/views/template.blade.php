<!doctype html>
<html>
    <head>
        <title>APP POKEMON</title>
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
            @yield('script')
        </footer>
    </body>
</html>
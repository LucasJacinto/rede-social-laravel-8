<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte do Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- CSS Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo_amigos.png" alt="Rede Social">
                    </a>
                    <!-- <div id="post-create-container">
                    <input type="text" class="form-control" name="search-friend" id="search-friend" placeholder="Procurar...">
                    </div> -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/profile" class="nav-link">Meu perfil</a>
                        </li>
                        <li class="nav-item">
                            <a href="/friends" class="nav-link">Amigos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/" class="nav-link">Grupos</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @yield('content')
        <footer>
            <p>Rede Social &copy; 2022</p>
        </footer>
    </body>
</html>

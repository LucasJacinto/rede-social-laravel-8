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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <!-- CSS da aplicação -->
        <link rel="stylesheet" href="/css/styles.css">

        <!-- JS da aplicação -->
        <script src="/js/scripts.js"></script>

        <!-- csrf -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <header>
            <nav id="nav" class="navbar navbar-expand-sm navbar-light">
                <div  id="navbar">
                    <div>
                        <div id="logo">
                            <a href="/" class="navbar-brand">
                                <img src="/img/logo_amigos.png" alt="Rede Social">
                            </a>
                        </div>
                        <div id="post-search-container">
                            <form class="form-inline" action="/" method="GET">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Procurar...">
                            </form>
                        </div>
                    </div>
                    <div>
                        <button id="btn-mobile">
                            <span id="hamburger"></span>
                        </button>
                        <ul class="navbar-nav">
                            @auth
                            <li class="nav-item">
                                <a href="/" class="nav-link">Início</a>
                            </li>
                            <li class="nav-item">
                                <a href="/profile" class="nav-link">Perfil</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a href="/logout"
                                       class="nav-link"
                                       onclick="event.preventDefault();
                                       this.closest('form').submit();"> 
                                       Sair
                                    </a>
                                </form>
                            </li>  
                            @endauth
                            @guest
                            <li class="nav-item">
                                <a href="/login" class="nav-link">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a href="/register" class="nav-link">Cadastrar</a>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @if(session('msg'))
            <p class="msg">{{ session('msg') }}</p>
        @endif
        @yield('content')
        <footer>
            <p>Rede Social &copy; 2022</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

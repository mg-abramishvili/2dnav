<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DreamApp Navigator</title>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
    <link href="{{ asset('css/filepond-plugin-image-preview.css') }}" rel="stylesheet">
    <script src="{{ asset('js/filepond-plugin-image-preview.js') }}"></script>
    <script src="{{ asset('js/filepond.js') }}"></script>
    <script src="{{ asset('js/filepond.jquery.js') }}"></script>

    <link href="{{ asset('css/summernote.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/summernote.min.js') }}"></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @auth
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/login') }}">
                    <img src="/img/adminlogo.svg" style="width:250px;margin-bottom: 10px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/stores">Помещения</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/tags">Категории</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/schemes">Схемы здания</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" data-toggle="dropdown">
                                Маршруты
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/routes_t/1">Маршруты от Т1</a>
                                <!--<a class="dropdown-item" href="/routes_t/2">Маршруты от Т2</a>-->
                            </div>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="/marks">Значки</a>
                        </li>-->
                        <!--<li class="nav-item">
                            <a class="nav-link" href="/markimages">Файлы иконок</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="/ads">Баннеры</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/specials">Скидки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/kiosks">Киоски</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/transports/1/edit">Как уехать</a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="/adds">Слайдер №2</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @endauth
        <main class="pb-4">
            <div class="container">
                <div class="container-inner">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    @yield('scripts')
</body>
</html>

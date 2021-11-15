<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Oto Kirala Test</title>

    <!-- font awesome -->
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">
    <!-- bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- core -->
    <link href={{ asset('css/style.css') }} rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>
<body>
<header class="position-relative">
    <div class="header-top">
        <div class="container">
            <div class="text-center @guest text-primary  @else text-dark @endguest logo">
                <h1>{{env('APP_NAME')}}</h1>
            </div>
        </div>
        <div
            class="header-nav @if(Route::getCurrentRoute()->action['prefix'] == '/admin') bg-dark @else bg-primary @endif">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 ">
                        <nav class="navbar navbar-expand-lg navbar-dark">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#main-sidebar" aria-controls="main-sidebar"
                                        aria-expanded="false" aria-label="Toggle navigation">

                                    <i class="fal fa-bars"></i>
                                </button>

                                <div class="collapse navbar-collapse" id="navbar-content">
                                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page"
                                                   href="{{ route('frontend.home') }}">
                                                    Anasayfa
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active" href="{{ route('frontend.vehicles') }}">
                                                    Araçlar
                                                </a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page"
                                                   href="{{ route('backend.dashboard') }}">
                                                    Gösterge Paneli
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link active" href="{{route('backend.vehicles.index')}}">
                                                    Araç Yönetimi
                                                </a>
                                            </li>

                                        @endguest
                                    </ul>
                                    @guest

                                        <a class="text-white me-2" href="{{ route('login') }}">
                                            Giriş Yap
                                        </a>

                                    @else
                                        <a class="text-white" href="{{ route('logout') }}">
                                            Çıkış Yap
                                        </a>

                                    @endguest

                                </div>

                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container d-block d-lg-none">
    <div class="main-sidebar" id="main-sidebar">
        <h5 class="sidebar-title">Menü</h5>
        <div class="list-group list-group-flush sidebar-list" id="main-sidebar-content">

            <a class="list-group-item" href="{{ route('frontend.home') }}">
                Anasayfa
            </a>
            <a class="list-group-item with-sub collapsed" href="{{ route('frontend.vehicles') }}">
                Araçlar
            </a>
            @guest
                <a class="list-group-item with-sub collapsed" href="{{ route('login') }}">
                    Giriş Yap
                </a>
            @else
                <a class="list-group-item with-sub collapsed" href="{{ route('backend.dashboard') }}">
                    Panel
                </a>
            @endguest


        </div>
    </div>


</div>

@yield('content')


<!-- bootstrap -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<!-- core -->
<script src="{{ asset('js/app.js') }}"></script>

</body>

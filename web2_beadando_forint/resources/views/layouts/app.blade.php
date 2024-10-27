<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/sass/bootstrap.scss','resources/js/app.js'])
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/lib/animate/animate.min.css') }}"/>
    <link href="{{ URL::asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div class="container-fluid topbar bg-light px-5 d-none d-lg-block">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">

                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        @guest
                            @if (Route::has('login'))
                        <a href="{{ route('register') }}"><small class="me-3 text-dark"><i class="fa fa-user text-primary me-2"></i>{{ __('Regisztráció') }}</small></a>
                            @endif

                            @if (Route::has('register'))
                        <a href="{{ route('login') }}"><small class="me-3 text-dark"><i class="fa fa-sign-in-alt text-primary me-2"></i>{{ __('Bejelentkezés') }}</small></a>
                                @endif
                        @else
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fa fa-home text-primary me-2"></i> {{ Auth::user()->name }}</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-power-off me-2"></i> {{ __('Kijelentkezés') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary"><i class="fas fa-search-dollar me-3"></i>Magyar Forint</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        @include('layouts/menu')
                    </div>
                </div>
            </nav>
            @if(Route::current()->getName() == '')
                <!-- Carousel Start -->
                <div class="header-carousel owl-carousel">
                    <div class="header-carousel-item">
                        <img src="{{ URL::asset('assets/images/jumbobg.jpg') }}" class="img-fluid w-100" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row gy-0 gx-5">
                                    <div class="col-lg-0 col-xl-5"></div>
                                    <div class="col-xl-7 animated fadeInLeft">
                                        <div class="text-sm-center text-md-end">
                                            <h4 class="text-primary text-uppercase fw-bold mb-4">Üdvözöljük a magyar forint oldalán!</h4>
                                            <h1 class="display-4 text-uppercase text-white mb-4">Fektessen ön is forintba!</h1>
                                            <p class="mb-5 fs-5">A magyar forint (HUF) Magyarország hivatalos fizetőeszköze, amelyet 1946. augusztus 1-jén vezettek be a pengő helyett, egy nagy inflációt követően..
                                            </p>
                                            <p class="mb-5 fs-5">
                                                A forint érméi és bankjegyei különböző címletekben kerültek forgalomba. Az érmék jelenleg <b>5, 10, 20, 50, 100 és 200</b> forintos címletekben érhetők el, míg a bankjegyek <b>500,1000,2000,5000,10000,20000</b>. A bankjegyeket a Magyar Nemzeti Bank bocsátja ki, és rendszeresen újítják meg a biztonsági elemeket a hamisítás elleni védelem érdekében.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Carousel End -->
            @else
                <div class="container-fluid bg-breadcrumb">
                    <div class="container text-center py-5" style="max-width: 900px;">
                        <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">

                        </h4>

                    </div>
                </div>
            @endif

        </div>
        <!-- Navbar & Hero End -->
        <main class="py-0">
            @yield('content')

        </main>

        <!-- Footer Start -->
        <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="container py-5 border-start-0 border-end-0" style="border: 1px solid; border-color: rgb(255, 255, 255, 0.08);">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-item">
                            <a href="index.html" class="p-0">
                                <h4 class="text-white"><i class="fas fa-search-dollar me-3"></i>Magyar Forint</h4>
                                <!-- <img src="img/logo.png" alt="Logo"> -->
                            </a>
                            <p class="mb-4">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum dolor sit amet, consectetur adipiscing...</p>
                            <div class="d-flex">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Gyors elérés</h4>

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Árfolyamok</h4>

                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-6 text-center text-md-start mb-md-0">
                        <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>WEB2 beadandó - Sándor Adrián, Katona Zsolt</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 text-center text-md-end text-body">

                        Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ URL::asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ URL::asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ URL::asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
</body>
</html>

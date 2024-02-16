<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>AUTOCOR</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('homepage/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('homepage/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('homepage/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('homepage/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    {{-- new boosttrap cartas autos --}}

    <!-- Favicon -->
    <link href="cartasaut/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('cartasaut/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('cartasaut/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('cartasaut/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('cartasaut/css/style.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="homepage/images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a><img src="homepage/images/logo1.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                {{-- <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" url="welcome"> Home </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Contact us</a>
                                    </li>
                                </ul> --}}
                                <div class="sign_btn">
                                    @if (Route::has('login'))
                                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                            @auth
                                                <a href="{{ url('/dashboard') }}"
                                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}"
                                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                    in</a>
{{-- 
                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}"
                                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                                @endif --}}
                                            @endauth
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-12">
                    <div class="text-bg">
                        <h1>Bienvenido a la Consesionaria AUTOCOR, donde encuentras los mejores autos </h1>
                        <strong>Facil de usar y rapido</strong>
                        <span>!No dudes en comprar tu primer auto!</span>
                        <p>
                            Para acceder a nuestro sistema debe ser registrado y asignado el rol por un administrador

                            <head></head>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    <!-- end banner -->
    <!-- car -->
    <div class="car">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Variedad de vehiculos de lujo</h2>
                        <span>Esta empresa cuenta con una amplia gama de vehiculos de lujo</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 padding_leri">
                    <div class="car_box">
                        <figure><img src="homepage/images/car_img1.png" alt="#" /></figure>
                        <h3>Hyundai</h3>
                    </div>
                </div>
                <div class="col-md-4 padding_leri">
                    <div class="car_box">
                        <figure><img src="homepage/images/car_img2.png" alt="#" /></figure>
                        <h3>Audi</h3>
                    </div>
                </div>
                <div class="col-md-4 padding_leri">
                    <div class="car_box">
                        <figure><img src="homepage/images/car_img3.png" alt="#" /></figure>
                        <h3>Bmw x5</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end car -->
    <!-- bestCar -->
    <!-- end cutomer -->
    {{-- carros en venta --}}
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Encuentra el auto de tus sueños</h1>
            <div class="row">
                @php
                    $unidadesMostradas = [];
                @endphp

                @foreach ($autos as $auto)
                    @php
                        $unidadId = $auto->unidad->id;
                    @endphp

                    {{-- Verificar si la unidad ya se ha mostrado y si no está despachada --}}
                    @if (!in_array($unidadId, $unidadesMostradas) && !$auto->despacho)
                        <div class="col-lg-4 col-md-6 mb-2">
                            <div class="rent-item mb-4">
                                <img class="img-fluid mb-4" src="{{ asset($auto->unidad->imagen) }}"
                                    alt="{{ $auto->unidad->marca }} {{ $auto->unidad->modelo }}">
                                <h4 class="text-uppercase mb-4">{{ $auto->unidad->marca }}
                                    {{ $auto->unidad->modelo }}</h4>
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-2">
                                        <i class="fa fa-calendar text-primary mr-1"></i>
                                        <span>{{ $auto->anio }}</span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <i class="fa fa-car text-primary mr-1"></i>
                                        <span>{{ $auto->unidad->tipo_auto }}</span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <i class="fa fa-road text-primary mr-1"></i>
                                        <span>{{ $auto->km }}</span>
                                    </div>
                                    <div class="px-2">
                                        <i class="fa fa-cogs text-primary mr-1"></i>
                                        <span>{{ $auto->motor->nom_motor }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Agregar la unidad actual al arreglo de unidades mostradas --}}
                        @php
                            $unidadesMostradas[] = $unidadId;
                        @endphp
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cont_call">
                            <h3> <strong class="multi color_chang"> LLame ahora</strong><br>
                                (+593) 0988349725
                            </h3>
                        </div>
                        <div class="cont">
                            <h3> <strong class="multi"> Los mejores autos</strong>
                                !sin duda!
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>© 2024 derechos de autocor reservados</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="{{ asset('homepage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('homepage/js/popper.min.js') }}"></script>
    <script src="{{ asset('homepage/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('homepage/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('homepage/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('homepage/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('homepage/js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

    {{-- new js scripts --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('cartasaut/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('cartasaut/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('cartasaut/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('cartasaut/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('cartasaut/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('cartasaut/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
</body>

</html>

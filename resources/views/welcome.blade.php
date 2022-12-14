<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Stylish Portfolio - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Simple line icons-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../admin/css/welcome.css" rel="stylesheet" />
    <style>
        .titlu {
            animation-name: titlu;
            animation-timing-function: cubic-bezier(0.26, 0.53, 0.74, 1.48);
            animation-duration: 1s;
        }

        @keyframes titlu {
            0% {
                opacity: 0;
                transform: scale(0.5, 0.5);
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
            }
        }
    </style>
</head>
<body id="page-top">
<!-- Navigation-->
{{--<a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>--}}
{{--<nav id="sidebar-wrapper">--}}
{{--    <ul class="sidebar-nav">--}}
{{--        <li class="sidebar-brand"><a href="#page-top">Start Bootstrap</a></li>--}}
{{--        <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>--}}
{{--        <li class="sidebar-nav-item"><a href="#about">About</a></li>--}}
{{--        <li class="sidebar-nav-item"><a href="#services">Services</a></li>--}}
{{--        <li class="sidebar-nav-item"><a href="#portfolio">Portfolio</a></li>--}}
{{--        <li class="sidebar-nav-item"><a href="#contact">Contact</a></li>--}}
{{--    </ul>--}}
{{--</nav>--}}
<!-- Header-->
<header class="masthead d-flex align-items-center" style="background-color:#222645;">
    <div class="container px-4 px-lg-5 text-center">
        <h1 class="mb-1 text-white titlu">Bună</h1>
        <h3 class="mb-5"><em>A Free Bootstrap Theme by Start Bootstrap</em></h3>
        @if(Route::has('login'))
            @auth
                <a class="btn btn-primary btn-xl" href="{{ url('/dashboard') }}">Home</a>
            @else
                <a class="btn btn-primary btn-xl" href="{{ route('login') }}">Login</a>
                @if(Route::has('register'))
                    <a class="btn btn-primary btn-xl" href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        @endif
    </div>
</header>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../admin/js/welcome.js"></script>
</body>
</html>



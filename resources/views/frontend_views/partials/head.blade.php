<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="@yield('meta_description', 'Site de stiri')" />
    <meta name="keywords" content="@yield('meta_keywords', 'site stiri actuale breaking news')" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>@yield('meta_title', 'World News')</title>
    <!-- plugin css for this page -->
    <link
        rel="stylesheet"
        href="{{asset('../frontend/assets/vendors/mdi/css/materialdesignicons.min.css')}}"
    />
    <link rel="stylesheet" href="{{asset('../frontend/assets/vendors/aos/dist/aos.css/aos.css"')}}"/>
    <link
        rel="stylesheet"
        href="{{asset('../frontend/assets/vendors/owl.carousel/dist/assets/owl.carousel.min.css')}}"
    />
    <link
        rel="stylesheet"
        href="{{asset('../frontend/assets/vendors/owl.carousel/dist/assets/owl.theme.default.min.css')}}"
    />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{asset('../frontend/assets/images/favicon.png')}}" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('../frontend/assets/css/style.css')}}">
    <script  src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- endinject -->
    @yield('custom-css')
</head>

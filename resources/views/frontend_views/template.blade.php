<!DOCTYPE html>
<html lang="zxx">
@include('frontend_views.partials.head')
<body>
<div class="container-scroller">
    <div class="main-panel">
        <header id="header">
            <div class="container">
                <!-- partial:partials/_navbar.html -->
                @include('frontend_views.partials.navbar')
                <!-- partial -->
            </div>
        </header>
        <div class="container">
            @yield('content')
        </div>
        <!-- main-panel ends -->
        <!-- container-scroller ends -->
        <!-- partial:partials/_footer.html -->
        @include('frontend_views.partials.footer')

        <!-- partial -->
    </div>
</div>
@include('frontend_views.partials.scripts')
</body>
</html>

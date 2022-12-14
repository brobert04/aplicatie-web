<!DOCTYPE html>
<html lang="en">
@include('admin.partials.dashboard-partials.head-dashboard')
<body class="sb-nav-fixed">
@include('admin.partials.dashboard-partials.topbar')
<div id="layoutSidenav">
    @include('admin.partials.dashboard-partials.sidenav')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">@yield('title')</h1>
                @yield('content')
            </div>
        </main>
        @include('admin.partials.dashboard-partials.footer')
    </div>
</div>
@include('admin.partials.dashboard-partials.scripts-dashboard')
</body>
</html>

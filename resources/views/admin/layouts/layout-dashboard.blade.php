<!DOCTYPE html>
<html lang="en">
@include('admin.partials.dashboard-partials.head-dashboard')
<body class="sb-nav-fixed">
@include('admin.partials.dashboard-partials.topbar')
<div id="layoutSidenav">
    @include('admin.partials.dashboard-partials.sidenav')
    <div id="layoutSidenav_content">
        <main>
    @yield('content')
        </main>
    </div>
</div>
@include('admin.partials.dashboard-partials.scripts-dashboard')
</body>
</html>

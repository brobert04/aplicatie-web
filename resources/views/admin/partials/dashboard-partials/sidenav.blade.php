<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @if(auth()->user()->role=='admin')
                <div class="sb-sidenav-menu-heading">Administrare</div>
                <a class="nav-link" href="{{route('users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Utilizatori
                </a>
                @endif
                <div class="sb-sidenav-menu-heading">Conținut</div>
                @can('author-rights')
                    <a class="nav-link" href="{{route('categories')}}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                        Categorii
                    </a>
                @endcan
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                    Postări
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('admin.posts') }}">Toate Postările</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Postări Publicate</a>
                    </nav>
                </div>
            </div>
        </div>
    </nav>
</div>

<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('dashboard')}}">World News</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">{{auth()->user()->name}} &nbsp;<i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{route('home')}}">Acasă</a></li>
                <li><a class="dropdown-item" href="{{route('user.profile')}}">Profil</a></li>
                @if(auth()->user()->role == 'autor')
                    <li><a class="dropdown-item" href="{{ route('admin.posts', ['autor'=> auth()->id]) }}">Postări</a></li>
                @endif
                <li>
                    <hr class="dropdown-divider"/>
                </li>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault();
                            this.closest('form').submit();">Deconectare</a>
                    </button>
                </li>
                </form>
            </ul>
        </li>
    </ul>
</nav>

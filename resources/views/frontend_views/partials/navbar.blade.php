<nav class="navbar navbar-expand-lg navbar-light">
    <div class="d-flex justify-content-between align-items-center navbar-top">
        <ul class="navbar-left">
            <li>{{ now()->format('F j, Y g:i a') }}</li>
            <li>&nbsp;</li>
        </ul>
        <div>
            <a class="navbar-brand" href="#"
            ><img src="{{asset('../frontend/assets/images/logo.svg')}}" alt=""
                /></a>
        </div>
        <div class="d-flex">
            <ul class="navbar-right">
                @if(Route::has('login'))
                    @auth
                        <li>
                            <a href="{{route('dashboard')}}">Panou Control</a>
                        </li>
                    @else
                        <li>
                            <a href="{{route('login')}}">LOGIN</a>
                        </li>
                        @if(Route::has('register'))
                            <li>
                                <a href="{{route('register')}}">REGISTER</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
            <ul class="social-media">
                <li>
                    <a href="#">
                        <i class="mdi mdi-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-linkedin"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="mdi mdi-twitter"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="navbar-bottom-menu">
        <button
            class="navbar-toggler"
            type="button"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div
            class="navbar-collapse justify-content-center collapse"
            id="navbarSupportedContent"
        >
            <ul
                class="navbar-nav d-lg-flex justify-content-between align-items-center"
            >
                <li>
                    <button class="navbar-close">
                        <i class="mdi mdi-close"></i>
                    </button>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/world.html">World</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/author.html">Magazine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/news-post.html">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/business.html">Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/sports.html">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/art.html">Art</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/politics.html">Politics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/real-estate.html">Real estate</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pages/travel.html">Travel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="mdi mdi-magnify"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

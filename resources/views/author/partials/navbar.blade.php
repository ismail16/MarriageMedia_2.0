<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar"  style="background: #e1f6ce !important;">
    <div class="container">

        <div class="sidebar d-lg-none">
            <div class="toggle">
                <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                    <!-- <i class="fa fa-align-justify text-primary h5"></i> -->
                </a>
            </div>
        </div>

        <a class="navbar-brand" href="/">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" alt="Taslima Marriage Media" style="width: 115px;border-radius: 4px;margin-top: -12px;">
        </a>
        <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu form-label font-weight-bold"></span> 
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link form-label" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link form-label" href="{{ route('about_us') }}">About Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link form-label" href="{{ route('contact_us') }}">Contact Us</a>
                </li>
                <li class="nav-item">
                <a class="nav-link form-label" href="{{ route('brides') }}">Brides</a>
                </li>
                <li class="nav-item">
                <a class="nav-link form-label" href="{{ route('grooms') }}">Grooms</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                {{-- <li class="nav-item auth-login">
                    <a href="{{ route('member.dashboard') }}" title="Home" class="nav-link form-label">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item auth-login">
                    <a title="Logout" class="nav-link form-label" onclick="logOut()">
                        Logout
                    </a>
                </li>

                <li class="nav-item without-auth-login">
                    <a class="nav-link form-label" href="{{ route('profile_create') }}">Create New Profile </a>
                </li>
                <li class="nav-item without-auth-login">
                    <a class="nav-link form-label" href="{{ route('login') }}">Login</a>
                </li> --}}

                @if(Route::has('user.login'))
                    @auth
                    <li class="nav-item">
                        <a href="{{ route('member.dashboard') }}" title="Home" class="nav-link form-label">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('member.userLogout') }}" title="Logout" class="nav-link form-label"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('member.userLogout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @endauth
                @else
                    <li class="nav-item">
                        <a class="nav-link form-label" href="{{ route('register') }}">Sign UP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link form-label" href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
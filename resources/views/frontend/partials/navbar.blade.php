<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light boxshadow-green" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img class="img-responsive" src="{{ asset('images/logo.png') }}" alt="BD Marriage Media"
                style="width: 140px;border-radius: 4px;margin-top: -12px;">
        </a>
        <button class="navbar-toggler mr-2" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle form-label" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (App::getLocale() == 'en')
                            <img src="{{ asset('images/icons/eng.jpg') }}" alt="English" width="20px" height="20px">
                        @elseif (App::getLocale() == 'bn')
                            <img src="{{ asset('images/icons/bn.jpg') }}" alt="Bangla" width="20px" height="20px">
                        @endif
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            <img src="{{ asset('images/icons/eng.jpg') }}" alt="English" width="20px" height="20px">
                            English
                        </a>
                        <a class="dropdown-item" href="#">
                            <img src="{{ asset('images/icons/bn.jpg') }}" alt="Bangla" width="20px" height="20px">
                            বাংলা
                        </a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item auth-login">
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
                </li>
            </ul>
        </div>

    </div>
</nav>
@if (Auth::check())
    <section class="content">
        <div class="container-fluid">
            @include('author.partials.progress_message')
        </div>
@endif
</section>

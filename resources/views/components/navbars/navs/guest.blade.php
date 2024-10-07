@props(['signin', 'signup'])

<nav
    class="">
    <div class="container-fluid ps-2 pe-0">
        
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                        href="{{ route('dashboard') }}">
                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route('profile') }}">
                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                        Profile
                    </a>
                </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route($signup) }}">
                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                        Sign Up
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="{{ route($signin) }}">
                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                        Sign In
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item">
                    <a href="https://www.creative-tim.com/product/material-dashboard-laravel"
                        class="btn btn-sm mb-0 me-1 bg-gradient-dark" target="_blank">Free download</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 grid gap-3">
                @auth  
                <li class="nav-item">
                    <span class="fw-bold uppercase">Welcome! {{ auth()->user()->name }}</span>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.index')}}" class="nav-link">
                        <span><i class="bi bi-gear"></i>Manage Post</span>
                    </a>
                </li> 
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light">
                            <i class="bi bi-door-closed-fill"></i>Logout
                        </button>
                    </form>
                </li>
                @endauth
                @guest   
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link"><i class="bi bi-person-plus-fill"></i></i>Register</a>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
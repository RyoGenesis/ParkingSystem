<header>
    <nav class="navbar navbar-expand-lg navbar-light menu-bg">
        <div class="container-fluid px-lg-5 mx-lg-4 px-4">
            <div>
                <a class="navbar-brand fst-italic " href="/"><i class="fas fa-car-alt"></i> ParkSys</a>
            </div>  
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapsed">
                <ul class="ms-auto navbar-nav mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('admin.profile') }}">Profile</a></li>                            
                                <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endauth
                </ul>
                <p id="clock" class="navbar-text text-center mb-0"></p>
            </div>    
        </div>
    </nav>
</header>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid px-5 mx-4">
            <div>
                <a class="navbar-brand " href="/">ParkSys</a>
            </div>  
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapsed">
                <ul class="ms-auto navbar-nav mb-2 mb-lg-0">
                    @guest         
                    
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/register">Register</a>
                    </li>
                    @endguest

                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/add-keyboard">Profile</a></li>                            
                                <li><a class="dropdown-item" href="/changePassword">Change Password</a></li>
                                <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endauth
                    
                    <p id="clock" class="navbar-text ms-2 mb-0"></p>     
                </ul>
            </div>
        </div>
    </nav>
</header>
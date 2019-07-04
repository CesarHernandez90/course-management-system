<nav class="navbar 
            navbar-expand-lg 
            navbar-transparent
            bg-white
            navbar-absolute 
            fixed-top">
    <div class="container-fluid">

        {{-- Navbar Title --}}
        <div class="navbar-wrapper">
            @yield('navbar-title')
        </div>

        {{-- Toggle Button --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse justify-content-end">

            <div class="navbar-form">
            </div>

            <ul class="navbar-nav">

                {{-- Cursos --}}
                <li class="nav-item">
                    <a class="nav-link" 
                        href="#">
                        <i class="material-icons">person</i>
                        <p style="display: inline;">Mis cursos</p>
                    </a>
                </li>

                {{-- Perfil --}}
                <li class="nav-item">
                    <a class="nav-link" 
                        href="#">
                        <i class="material-icons">person</i>
                        <p style="display: inline;">Mi perfil</p>
                    </a>
                </li>

                {{-- Notificaciones --}}
                <li class="nav-item">
                    <a class="nav-link" 
                        href="#">
                        <i class="material-icons">notifications</i>
                        <span class="notification">2</span>
                        <p> notificaciones</p>
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>
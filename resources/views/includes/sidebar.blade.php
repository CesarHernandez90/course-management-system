<div class="sidebar"
    data-color="purple"
    data-background-color="white"
    data-image="{{asset('img/sidebar-1.jpg')}}">

    {{-- Logo --}}
    <div class="logo">
        <a href="" 
            class="simple-text logo-normal">
            {{ auth()->user()->profile->name }}
        </a>
        <a class="simple-link" 
            href="{{ route('logout') }}"
            onclick="
                event.preventDefault();
                document.getElementById('logout-form').submit();">
            Cerrar sesión
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    {{-- Menu --}}
    <div class="sidebar-wrapper">

        <ul class="nav">

            <li class="nav-item {{ request()->is('user*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{route('user.index')}}">
                    <i class="material-icons">supervisor_account</i>
                    <p>Usuarios</p>
                </a>
            </li>
            
            <li class="nav-item {{ request()->is('department*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{route('department.index')}}">
                    <i class="material-icons">local_library</i>
                    <p>Departamentos</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('course*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{route('course.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Cursos</p>
                </a>
            </li>

            <li class="nav-item {{ request()->is('coursetype*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{route('coursetype.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Tipos de cursos</p>
                </a>
            </li>

        </ul>
    </div>

</div>
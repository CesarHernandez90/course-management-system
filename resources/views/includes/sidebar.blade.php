<div class="sidebar"
    data-color="purple"
    data-background-color="white"
    data-image="{{asset('img/sidebar-1.jpg')}}">

    {{-- Logo --}}
    <div class="logo">
        <a href="" 
            class="simple-text logo-normal">
            {{ Auth::user()->name }}
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

            <li class="nav-item active">
                <a class="nav-link"
                    href="{{route('department.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Departamentos</p>
                </a>
            </li>



        </ul>
    </div>

</div>
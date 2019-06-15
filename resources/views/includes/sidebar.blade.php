<div class="sidebar"
    data-color="purple"
    data-background-color="white"
    data-image="{{asset('img/sidebar-1.jpg')}}">

    {{-- Logo --}}
    <div class="logo">
        <a href="" 
            class="simple-text logo-normal">
            Sistema de cursos
        </a>
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
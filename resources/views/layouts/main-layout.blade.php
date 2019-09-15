<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta 
        name="viewport"
        content="
            width=device-width, 
            initial-scale=1.0,
            maximum-scale=1.0,
            user-scalable=0" >
    <meta
        http-equiv="X-UA-Compatible"
        content="IE=edge,chrome=1" >

    {{-- Title --}}
    <title> @yield('title', 'Sistema de administración de cursos') </title>

    <!-- CSS Files -->
    @include('includes/styles')
</head>
<body>
<div class="wrapper ">

    {{-- Sidebar --}}
    @include('includes/sidebar')
    
    <div class="main-panel">

        <!-- Navbar -->
        @include('includes/navbar')

        <div class="content mtop-0">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    
                    {{-- Content --}}
                    @yield('content')
    
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">

                {{-- Footer --}}
                {{-- @include('includes/footer') --}}
            </div>
        </footer>

    </div>

</div>

    {{-- JS Files --}}
    @include('includes/scripts')
</body>
</html>
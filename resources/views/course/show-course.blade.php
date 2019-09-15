@extends('layouts/main-layout')

@section('title', '{{$course->name}}')
@section('navbar-title')
    @navbarTitle([
        'url' => 'course.index',
        'title' => 'Cursos'
    ]) @endnavbarTitle
@endsection

@section('content')

    @if ($message=Session::get('success'))
    <div id="displayAlert" data-color="success" data-align="bottom"
        data-message="{{$message}}">
    </div>
    @endif
    @if ($message=Session::get('warning'))
    <div id="displayAlert" data-color="warning" data-align="bottom"
        data-message="{{$message}}">
    </div>
    @endif

    <div class="card max-800">
        <img src="{{asset('share/course/'.$course->img)}}" class="card-img-top">
        <div class="card-body">
            
            <h4 class="card-title">{{$course->name}}</h4>
            <h6 class="card-subtitle mb-2 mt-1 text-muted">{{$course->department->name}}</h6>
            <p class="card-text">{{$course->description}}</p>
            @if($canApply)
            <a href="{{route('course.applyCourse', $course->id)}}" class="btn btn-success btn-sm">
                Aplicar al curso
            </a>
            @else
            <a href="{{route('course.leaveCourse', $course->id)}}" class="btn btn-warning btn-sm">
                Dejar el curso
            </a>
            @endif

            <table class="table table-hover">
                <thead class="text-primary">
                    <th>Nombre</th>
                    {{-- <th>Email</th>
                    <th>Departamento</th>
                    <th class="text-right">Acciones</th> --}}
                </thead>

                <tbody>
                    @foreach ($profiles as $profile)
                    <tr>
                        <td>{{$profile->name}}</td>
                        {{-- <td>{{$user->email}}</td>
                        <td>{{$user->profile->department->name}}</td> --}}
                        {{-- @formActions([
                        'id' => $user->id,
                        'name' => $user->profile->name,
                        'route' => 'user'
                        ]) @endformActions --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>

@endsection
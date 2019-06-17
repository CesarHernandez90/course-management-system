@extends('layouts/main-layout')

@section('title', 'Cursos')
@section('navbar-title', '')

@section('content')

    {{-- Period area --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">

                    {{-- Select period --}}
                    <div class="col-md-8 col-xl-6">
                        <div class="btn-block">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-block" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{$selectedPeriod[0]->name}}
                                </button>
                                <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenuButton">
                                    @foreach ($periods as $period)
                                        <a class="dropdown-item" 
                                            href="{{route('course.period', $period->id)}}">
                                            {{$period->name}}
                                        </a>   
                                    @endforeach
                                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-warning text-uppercase" 
                                            href="#">
                                            Crear un nuevo periodo
                                        </a>
                                    </div>
                            </div>

                        </div>
                    </div>

                    {{-- Button new course --}}
                    <div class="col-md-4 col-xl-3">
                        <a class="btn btn-info btn-block"
                            href="">
                            Nuevo curso
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Course area --}}
    @foreach ($courses as $course)
        <div class="col-md-6 col-xl-4 col-xxl-3">
            <div class="card">
                <img src="{{asset('share/course/'.$course->img)}}" 
                    class="card-img-top">
                <div class="card-body">
                    <h4 class="card-title">{{$course->name}}</h4>
                    <h6 class="card-subtitle mb-2 mt-1 text-muted">{{$course->department}}</h6>
                    <p class="card-text">{{$course->description}}</p>
                    <a href="#0" class="card-link">Card link</a>
                    <a href="#0" class="card-link">Another link</a>
                </div>
            </div>
        </div>   
    @endforeach
        
@endsection
@extends('layouts/main-layout')

@section('title', 'Cursos')
@section('navbar-title', '')

@section('content')

    {{-- Period area --}}
    <div class="col-md-12">
        <div class="card" style="margin: 0;">
            <div class="card-body">
                <div class="row align-items-center">

                    {{-- Select period --}}
                    <div class="col-md-8 col-xl-6">
                        <div class="btn-block">

                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-block" type="button"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    {{$fatherPeriod->name}}
                                </button>
                                <div class="dropdown-menu btn-block" aria-labelledby="dropdownMenuButton">
                                    @foreach ($periods as $period)
                                        <a class="dropdown-item" 
                                            href="{{route('course.period', $period->id)}}">
                                            {{$period->name}}
                                        </a>   
                                    @endforeach
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-uppercase" 
                                        href="{{route('period.index')}}">
                                        Ver todos los periodos
                                    </a>
                                    {{-- <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item text-uppercase" 
                                        href="{{route('coursetype.index')}}" >
                                        Ver todos los tipos de cursos
                                    </a>
                                </div>                     
                            </div>

                        </div>
                    </div>

                    <div class="dropdown show">
                        <a class="btn btn-info dropdown-toggle" role="button" 
                            id="dropdownMenuLink" data-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false">
                          Crear nuevo
                        </a>
                      
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('course.create', $fatherPeriod->id)}}">Curso</a>
                            <a class="dropdown-item" href="{{route('period.create')}}">Periodo</a>
                            <a class="dropdown-item" href="{{route('coursetype.create')}}">Tipo de curso</a>
                        </div>
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
                    <h6 class="card-subtitle mb-2 mt-1 text-muted">{{$course->department->name}}</h6>
                    <p class="card-text">{{$course->description}}</p>
                    <a href="{{route('course.show', $course->id)}}" 
                        class="btn btn-primary btn-sm">
                        Más información
                    </a>
                </div>
            </div>
        </div>   
    @endforeach
        
@endsection
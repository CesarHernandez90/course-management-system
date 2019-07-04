@extends('layouts/guess-layout')

@section('title', 'Oferta académica')
@section('navbar-title', '')

@section('content')

    {{-- Filter area --}}
    {{-- <div class="col-md-12">
        <div class="card" style="margin: 0;">
            <div class="card-body">
                <div class="row align-items-center">

                </div>
            </div>
        </div>
    </div> --}}

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
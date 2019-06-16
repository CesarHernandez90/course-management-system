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
                    <div class="col-md-12 col-lg-12 col-xl-6">
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04">
                                @foreach ($periods as $period)
                                    <option value="{{$period->id}}">{{$period->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    {{-- Button wew period --}}
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <button class="btn btn-info btn-block">Nuevo periodo</button>
                    </div>

                    {{-- Button new course --}}
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <button class="btn btn-warning btn-block">Nuevo curso</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-4 col-xxl-3">
        <div class="card">
            <img src="{{asset('img/course_example.jpg')}}" 
                class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">Título del curso</h4>
                <h6 class="card-subtitle mb-2 mt-1 text-muted">Horario del curso</h6>

                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita magni deserunt dignissimos vero officiis quo veritatis sed quos odio? Architecto sed sit ipsum praesentium voluptate nam ad numquam molestias est.</p>
                <a href="#0" class="card-link">Card link</a>
                <a href="#0" class="card-link">Another link</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 col-xxl-3">
        <div class="card">
            <img src="{{asset('img/course_example.jpg')}}" 
                class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">Título del curso</h4>
                <h6 class="card-subtitle mb-2 mt-1 text-muted">Horario del curso</h6>

                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita magni deserunt dignissimos vero officiis quo veritatis sed quos odio? Architecto sed sit ipsum praesentium voluptate nam ad numquam molestias est.</p>
                <a href="#0" class="card-link">Card link</a>
                <a href="#0" class="card-link">Another link</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4 col-xxl-3">
        <div class="card">
            <img src="{{asset('img/course_example.jpg')}}" 
                class="card-img-top">
            <div class="card-body">
                <h4 class="card-title">Título del curso</h4>
                <h6 class="card-subtitle mb-2 mt-1 text-muted">Horario del curso</h6>

                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita magni deserunt dignissimos vero officiis quo veritatis sed quos odio? Architecto sed sit ipsum praesentium voluptate nam ad numquam molestias est.</p>
                <a href="#0" class="card-link">Card link</a>
                <a href="#0" class="card-link">Another link</a>
            </div>
        </div>
    </div>
        
@endsection
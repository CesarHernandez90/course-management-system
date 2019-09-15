@extends('layouts/main-layout')

@section('title', 'Nuevo curso')
@section('navbar-title')
    @navbarTitle([
        'url' => 'course.index',
        'title' => 'Cursos'
    ]) @endnavbarTitle
@endsection

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('course.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    {{-- Nombre del curso --}}
                    <div class="form-group">
                        <label for="name">
                            Nombre del curso
                        </label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                        @if ($errors->first('name'))
                            @foreach ($errors->get('name') as $error)
                                <small class="form-text text-muted text-danger">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>

                    {{-- Horario --}}
                    <div class="form-group">
                        <label for="name">
                            Horario
                        </label>
                        <input type="text" 
                            class="form-control" 
                            name="schedule" 
                            value="{{old('schedule')}}"
                            placeholder="Ejemplo: Martes y Jueves de 8-10am">
                        @if ($errors->first('schedule'))
                            @foreach ($errors->get('schedule') as $error)
                                <small class="form-text text-muted text-danger">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>          

                    {{-- Descripción --}}
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" 
                            id="description" 
                            rows="7"
                            name="description">
                        </textarea>
                    </div>

                    {{-- Tipo de curso --}}
                    <div class="form-group">
                            <label for="courseType">Tipo de curso</label>
                            <div class="dropdown bootstrap-select form-control select-margin">
                                <select class="form-control selectpicker" id="courseType" data-live-search="true"
                                    name="course_type_id">
                                    @foreach ($courseTypes as $courseType)
                                    <option value="{{$courseType->id}}">
                                        {{$courseType->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        {{-- Docente --}}
                        <div class="form-group">
                            <label for="teacher">Docente</label>
                            <div class="dropdown bootstrap-select form-control select-margin">
                                <select class="form-control selectpicker" id="teacher" data-live-search="true"
                                    name="teacher_id">
                                    @foreach ($teachers as $teacher)
                                    <option value="{{$courseType->id}}">
                                        {{$teacher->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>      

                    {{-- Imágen --}}
                    <div class="sform-group">
                        <label for="exampleFormControlFile1">Seleccionar imágen</label>
                        <input type="file" class="form-control-file" 
                        id="exampleFormControlFile1" name="img">
                    </div>

                    {{-- Hidden imputs --}}
                    <input type="hidden" name="period_id" value="{{$fatherPeriod->id}}">
                    <input type="hidden" name="department_id" value="{{auth()->user()->profile->department_id}}">

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">
                            Crear curso
                        </button>
                        <a class="btn btn-info" href="{{route('course.period', $fatherPeriod->id)}}">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
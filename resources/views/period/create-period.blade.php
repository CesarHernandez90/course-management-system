@extends('layouts/main-layout')

@section('title', 'Nuevo periodo')
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
                <form action="{{route('period.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">
                            Nombre del periodo
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

                    <!-- input with datetimepicker -->
                    <div class="form-group">
                        <label class="label-control">Fecha de inicio</label>
                        <input type="text" class="form-control datetimepicker" name="start" />
                        @if ($errors->first('start'))
                            @foreach ($errors->get('start') as $error)
                                <small class="form-text text-muted text-danger">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>

                    <!-- input with datetimepicker -->
                    <div class="form-group">
                        <label class="label-control" name="end">Fecha de cierre</label>
                        <input type="text" class="form-control datetimepicker" name="end" />
                        @if ($errors->first('end'))
                            @foreach ($errors->get('end') as $error)
                                <small class="form-text text-muted text-danger">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Crear periodo
                    </button>
                    <a class="btn btn-info" href="{{route('course.index')}}">
                        Cancelar
                    </a>                           
                </form>
            </div>
        </div>
    </div>
@endsection
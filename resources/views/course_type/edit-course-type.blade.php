@extends('layouts/main-layout')

@section('title', 'Nuevo tipo de curso')
@section('navbar-title')
    @navbarTitle([
        'url' => 'coursetype.index',
        'title' => 'Tipos de cursos'
    ]) @endnavbarTitle
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action=" {{route('coursetype.update', $coursetype->id)}} " method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" 
                        class="form-control" 
                        name="name"
                        value="{{$coursetype->name}}">
                    @if ($errors->first('name'))
                        @foreach ($errors->get('name') as $error)
                            <small class="form-text text-muted text-danger">
                                {{$error}}
                            </small>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">
                        Descripcion
                    </label>
                    <input type="text" 
                        class="form-control" 
                        name="description"
                        value="{{$coursetype->description}}">
                    @if ($errors->first('description'))
                        @foreach ($errors->get('description') as $error)
                            <small class="form-text text-muted text-danger">
                                {{$error}}
                            </small>
                        @endforeach
                    @endif
                </div>
                <button type="submit" 
                    class="btn btn-primary">
                    Guardar cambios
                </button>
                <a class="btn btn-info"
                    href="{{route('coursetype.index')}}">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts/main-layout')

@section('title', 'Nuevo departamento')
@section('navbar-title')
    @navbarTitle([
        'url' => 'user.index',
        'title' => 'Usuarios'
    ]) @endnavbarTitle
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action=" {{route('user.store')}} " method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" 
                        class="form-control" 
                        name="name"
                        value="{{old('name')}}">
                    @if ($errors->first('name'))
                        @foreach ($errors->get('name') as $error)
                            <small class="form-text text-muted text-danger">
                                {{$error}}
                            </small>
                        @endforeach
                    @endif
                </div>
                <button type="submit" 
                    class="btn btn-primary">
                    Crear usuario
                </button>
                <a class="btn btn-info"
                    href="{{route('user.index')}}">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
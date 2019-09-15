@extends('layouts/main-layout')

@section('title', 'Editar usuario')
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
            <form action=" {{route('user.update', $user->id)}} " method="POST">
                @csrf
                @method('PUT')

                {{-- Nombre --}}
                <div class="form-group">
                    <label for="name">
                        Nombre
                    </label>
                    <input type="text" 
                        class="form-control" 
                        name="name"
                        value="{{$user->profile->name}}">
                    @if ($errors->first('name'))
                        @foreach ($errors->get('name') as $error)
                            <small class="form-text text-muted text-danger">
                                {{$error}}
                            </small>
                        @endforeach
                    @endif
                </div>

                {{-- Email --}}
                <div class="form-group">
                        <label for="email">
                            Email
                        </label>
                        <input type="text" 
                            class="form-control" 
                            name="email"
                            value="{{$user->email}}">
                        @if ($errors->first('email'))
                            @foreach ($errors->get('email') as $error)
                                <small class="form-text text-muted text-danger">
                                    {{$error}}
                                </small>
                            @endforeach
                        @endif
                    </div>

                {{-- Departamento --}}
                <div class="form-group">
                    <label for="department">Departamento</label>
                    <div class="dropdown bootstrap-select form-control select-margin">
                        <select class="form-control selectpicker" id="department" data-live-search="true"
                            name="department_id" value="3">
                            @foreach ($departments as $department)
                            <option value="{{$department->id}}" {{($department->id == $user->profile->department_id ? 'selected' : '')}}>
                                {{$department->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <button type="submit" 
                    class="btn btn-primary">
                    Guardar cambios
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
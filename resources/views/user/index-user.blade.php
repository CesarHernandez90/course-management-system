@extends('layouts/main-layout')

@section('title', 'Usuarios')
@section('navbar-title', '')

@section('content')
    <div class="col-md-12">

        <a class="btn btn-info"
            href="{{route('user.create')}}">
            Nuevo usuario
        </a>

        @if ($message=Session::get('success'))
        <div id="displayAlert" data-color="success" data-align="bottom"
            data-message="{{$message}}">
        </div>
        @endif

        <div class="card" style="margin-top: 5px;">
            <div class="card-body">

                <table class="table table-hover">
                    <thead class="text-primary">
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Departamento</th>
                        <th class="text-right">Acciones</th>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->profile->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->profile->department->name}}</td>
                                @formActions([
                                    'id' => $user->id,
                                    'name' => $user->profile->name,
                                    'route' => 'user'
                                ]) @endformActions
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
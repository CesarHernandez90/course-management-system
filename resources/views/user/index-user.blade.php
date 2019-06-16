@extends('layouts/main-layout')

@section('title', 'Usuarios')
@section('navbar-title', '')

@section('content')
    <div class="col-md-12">

        <a class="btn btn-info"
            href="{{route('user.create')}}">
            Nuevo usuario
        </a>

        <div class="card">
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
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->department}}</td>
                                @formActions([
                                    'id' => $user->id,
                                    'name' => $user->name,
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
@extends('layouts/main-layout')

@section('title', 'Departamentos')
@section('navbar-title', '')

@section('content')
    <div class="col-md-12">

        <a class="btn btn-info"
            href="{{route('department.create')}}">
            Nuevo departamento
        </a>

        <div class="card">
            <div class="card-body">

                <table class="table table-hover">
                    <thead class="text-primary">
                        <th>Nombre</th>
                        <th class="text-right">Acciones</th>
                    </thead>

                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->name}}</td>
                                @formActions([
                                    'id' => $department->id,
                                    'name' => $department->name,
                                    'route' => 'department'
                                ]) @endformActions
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
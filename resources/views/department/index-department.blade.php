@extends('layouts/main-layout')

@section('title', 'Departamentos')
@section('navbar-title', 'Departamentos')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <table class="table">
                    <thead class="text-primary">
                        <th>Nombre</th>
                        <th class="text-right">Acciones</th>
                    </thead>

                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->name}}</td>
                                @component('components/formActions', [
                                    'id' => $department->id,
                                    'name' => $department->name,
                                    'route' => 'department.destroy'
                                ]) @endcomponent
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@extends('layouts/main-layout')

@section('title', 'Tipos de cursos')
@section('navbar-title')
    @navbarTitle([
        'url' => 'course.index',
        'title' => 'Cursos'
    ]) @endnavbarTitle
@endsection

@section('content')
    <div class="col-md-12">

        <a class="btn btn-info"
            href="{{route('coursetype.create')}}">
            Nuevo tipo de curso
        </a>

        <div class="card" style="margin-top: 5px;">
            <div class="card-body">

                <table class="table table-hover">
                    <thead class="text-primary">
                        <th>Nombre</th>
                        <th class="text-right">Acciones</th>
                    </thead>

                    <tbody>
                        @foreach ($coursetypes as $coursetype)
                            <tr>
                                <td>{{$coursetype->name}}</td>
                                @formActions([
                                    'id' => $coursetype->id,
                                    'name' => $coursetype->name,
                                    'route' => 'coursetype'
                                ]) @endformActions
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
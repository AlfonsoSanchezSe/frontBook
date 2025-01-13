
@extends('layout')

@section('title', 'Listado')

@section('content')
<div class="container">
    <h1>Libros</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-success btn-sm" href="{{ route('createBook') }}"><i class="fa fa-plus"></i> Crear Libro</a>
    </div>

    @if(isset($libros))
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Genero</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Publicado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($libros as $libro)

                    <tr>
                        <td>{{ $libro['id'] }}</td>
                        <td>{{ $libro['isbn'] }}</td>
                        <td>{{ $libro['gen'] }}</td>
                        <td>{{ $libro['status'] }}</td>
                        <td>{{ $libro['price'] }}</td>
                        <td>{{ $libro['published'] }}</td>
                        <td>
                            <a href="{{ route('updateBook', ['id' => $libro['id']]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
                            <a href="{{ route('confirmDelete', ['id' => $libro['id']]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection




@extends('layout')

@section('title', 'Crear Libro')

@section('content')
<div class="container">
    <h1>Libros</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('proccessCreateBook') }}">
                @csrf
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="form-group">
                    <label for="gen">Genero</label>
                    <input type="text" class="form-control" id="gen" name="gen" required>
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" id="state" name="state" required>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="published">Publicado</label>
                    <input type="date" class="form-control" id="published" name="published" required>
                </div>
                <button type="submit" class="btn btn-success">Crear Libro</button>
            </form>
    
</div>
@endsection

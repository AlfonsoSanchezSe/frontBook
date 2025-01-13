


@extends('layout')

@section('title', 'Crear Libro')

@section('content')
<div class="container">
    <h1>Crear Libro</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-warning btn-sm" href="{{ route('books') }}"><i class="fa fa-plus"></i>Volver al inicio</a>
    </div>

    <form method="POST" action="{{ route('proccessCreateBook') }}">
                @csrf
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
                <div class="form-group">
                    <label for="gen">Genero</label>
                    <select name="gen" class="form-control" id="gen" required>
                        <option value="" selected disabled>Selecciona una opcion...</option>
                        <option value="DRAMA">Drama</option>
                        <option value="SCIFI">Ciencia ficcion</option>
                        <option value="MANGA">Manga</option>
                        <option value="SPORTS">Deportes</option>
                        <option value="COOKING">Cocina</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <select name="state" class="form-control" id="state" required>
                        <option value="" selected disabled>Selecciona una opcion...</option>
                        <option value="ONSALE">A la venta</option>
                        <option value="PREORDER">Preventa</option>
                        </select>
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

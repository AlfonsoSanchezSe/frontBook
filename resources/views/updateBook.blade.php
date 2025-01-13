


@extends('layout')

@section('title', 'Editar Libro')

@section('content')
<div class="container">
    <h1>Editar Libro</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('books') }}">
                @csrf
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required value="{{$libro['isbn']}}">
                </div>
                <div class="form-group">
                    <label for="gen">Genero</label>
                    <input type="text" class="form-control" name="gen" id="gen" value="{{$libro['gen']}}">
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <input type="text" class="form-control" name="state" id="state" value="{{$libro['status']}}">
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" required value="{{$libro['price']}}">
                </div>
                <div class="form-group">
                    <label for="published">Publicado</label>
                    <input type="date" class="form-control" id="published" name="published" required value="{{$libro['published']}}">
                </div>
                <button type="submit" class="btn btn-primary">Editar Libro</button>
            </form>
    
</div>
@endsection

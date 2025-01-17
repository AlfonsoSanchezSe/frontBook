


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

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-warning btn-sm" href="{{ route('books') }}"><i class="fa fa-plus"></i>Volver al inicio</a>
    </div>

    <form method="POST" action="{{ route('proccessUpdate', $libro['id']) }}">
    {{ csrf_field() }}
                <!-- <div class="form-group">
                    <label for="id">ID</label>
                    <input type="text" disabled class="form-control" id="id" name="id" required value="{{$libro['id']}}">
                </div> -->
                <div class="form-group">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required value="{{$libro['isbn']}}">
                </div>
                <div class="form-group">
                    <label for="gen">Genero</label>
                    <select name="gen" class="form-control" id="gen" required>

                        <option  {{ $libro['gen']== "DRAMA" ? 'selected' : '' }} value="DRAMA">Drama</option>

                        <option {{ $libro['gen']== "SCIFI" ? 'selected' : '' }} value="SCIFI">Ciencia ficcion</option>

                        <option {{ $libro['gen']== "MANGA" ? 'selected' : '' }} value="MANGA">Manga</option>

                        <option {{ $libro['gen']== "SPORTS" ? 'selected' : '' }} value="SPORTS">Deportes</option>

                        <option {{ $libro['gen']== "COOKING" ? 'selected' : '' }} value="COOKING">Cocina</option>

                    </select>
                </div>
                <div class="form-group">
                    <label for="state">Estado</label>
                    <select name="state" class="form-control" id="state" required>
                        @if($libro["status"] == "ONSALE")
                        <option selected value="ONSALE">A la venta</option>
                        @else
                        <option value="ONSALE">A la venta</option>
                        @endif
                        @if($libro["status"] == "PREORDER")
                        <option selected value="PREORDER">Preventa</option>
                        @else
                        <option value="PREORDER">Preventa</option>
                        @endif
                        </select>
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




@extends('layout')

@section('title', 'Eliminar Libro')

@section('content')
<div class="container">
    <h1>Eliminar Libro</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="border border-danger">
        <h3>¿Estas seguro de que quieres eliminar el libro con isbn {{ $libro['isbn'] }}?</h3>
        <a href="{{ route('deleteBook', $libro['id']) }}" class="btn btn-danger btn-sm">Si</a>
        <a href="{{ route('books') }}" class="btn btn-primary btn-sm">No</a>
    </div>

    
</div>
@endsection

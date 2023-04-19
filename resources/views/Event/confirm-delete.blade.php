@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Eliminar evento</h1>

        <p>¿Está seguro de que desea eliminar el evento "{{ $event->title }}"?</p>

        <form action="{{ route('events.destroy', $event) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <a href="{{ route('events.show', $event) }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection

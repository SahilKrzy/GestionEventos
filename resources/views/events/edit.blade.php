@extends('layouts.app')

@section('content')

<div class="container text-light">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-secondary text-light">
                <div class="card-header">
                    <h3>Edit event</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('events.update', $event->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $event->title }}" />
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $event->description }}" />
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" class="form-control" name="location" id="location" value="{{ $event->location }}" />
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            {{-- Recive la fecha del evento seleccionado y le cambia el formato para mostrar solo la fecha sin la hora  --}}
                            <input type="date" class="form-control" name="date" id="date" value="{{ date('d-m-Y', strtotime($event->date)) }}" />
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-primary" value="Update Event">
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
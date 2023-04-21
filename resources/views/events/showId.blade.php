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
                    <h1 class="card-title">{{ $event->title }}</h1>
                    <p class="card-text"><b>Description: </b>{{ $event->description }}</p>
                    <p class="card-text"><b>Location: </b>{{ $event->location }}</p>
                    {{-- Recive la fecha del evento seleccionado y le cambia el formato para mostrar solo la fecha sin la hora  --}}
                    <p class="card-text"><b>Date: </b>{{ date('d-m-Y', strtotime($event->date)) }}</p>
                    <a href="{{ route('events.index') }}" class="btn btn-light">Go home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
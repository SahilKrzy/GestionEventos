@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create an Event</h1>
        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            <div>
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" />
            </div>

            <div>
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="description" />
            </div>
            <div>
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" id="location" />
            </div>
            <div>
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" name="date" id="date" />
            </div>
            <input type="submit" class="btn btn-primary" style="margin-top: 25px" value="Create Event">
            <a  class="btn btn-secondary" style="margin-top: 25px" href="{{ route('home') }}">Cancel</a>
        </form>

        {{-- Muestra el error si la pagina ha recibido uno  --}}
        @if ($errors->has('error'))
        <div class="alert alert-danger" role="alert" style="margin: 10px">
            {{ $errors->first('error') }}
        </div>
    @endif
    </div>
@endsection

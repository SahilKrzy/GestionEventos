@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <h5>{{ $event->date->format('m/d/Y h:i A') }}</h5>
        <p>{{ $event->location }}</p>
        <p>{{ $event->description }}</p>
        <hr>
        @if ($event->user_id == Auth::id())
            <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit Event</a>
            <form action="{{ route('events.destroy', $event->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">Delete Event</button>
            </form>
            <hr>
        @endif
        <h2>Attendees</h2>
        @if ($event->attendees->count() > 0)
            <ul>
                @foreach ($event->attendees as $attendee)
                    <li>{{ $attendee->name }}</li>
                @endforeach
            </ul>
        @else
            <p>No attendees yet.</p>
        @endif
        <hr>
        <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Events</a>
    </div>
@endsection

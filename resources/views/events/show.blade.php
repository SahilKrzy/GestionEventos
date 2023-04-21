@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Event List</h1>
    @if (count($events) == 0)
    <div style="margin: 20px">
        <h4>We haven't got any event in our database. Create One.</h4><br />
        <a href="{{ route('events.create') }}" class="btn btn-primary">Create an event</a>
    </div>
    @else
    <table class="table table-info table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->location }}</td>
                {{-- Recive la fecha del evento seleccionado y le cambia el formato para mostrar solo la fecha sin la hora  --}}
                <td>{{ date('d-m-Y', strtotime($event->date)) }}</td>
                <td>
                    <a href="{{ route('events.show', [$event->id]) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <form method="POST" action="{{ route('events.destroy', $event->id) }}" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                    <a href="{{ route('events.register', $event->id) }}" class="btn btn-info"><i class="bi bi-person-plus"></i></a>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 20px">
        <a href="{{ route('events.create') }}" class="btn btn-primary">Create an event</a>
    </div>
    @endif
</div>
@endsection
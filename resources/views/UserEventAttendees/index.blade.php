@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Event Attendees</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Event</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userEventAttendees as $userEventAttendee)
                                <tr>
                                    <td>{{ $userEventAttendee->user->name }}</td>
                                    <td>{{ $userEventAttendee->event->name }}</td>
                                    <td>
                                        <form action="{{ route('user-event-attendees.destroy', $userEventAttendee->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

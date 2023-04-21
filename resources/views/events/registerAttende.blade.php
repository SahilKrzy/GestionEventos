@extends('layouts.app')

@section('content')
<div class="container text-light">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-secondary text-light">
                <div class="card-header">
                    <h3>{{ __('Register') }}</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div>
                            <h1>{{ $event->title }}</h1>
                            <h4>{{ $event->description }}</h4>
                            <h4>{{ date('d-m-Y', strtotime($event->date)) }}</h4>
                        </div>
                        <form method="POST" action="{{ route('events_users.store', $event->id) }}">
                            @csrf
                            <div>
                                <label for="user_id" class="form-label">User</label>
                                <select name="user_id" id="user_id" class="form-select">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-success" style="margin-top: 25px">Register</button>
                            <a href="{{ route('events.index') }}" class="btn btn-danger" style="margin-top: 25px">Cancel</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
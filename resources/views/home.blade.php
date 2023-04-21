@extends('layouts.app')

@section('content')
    @php
        header("Location: " . route('events.index'));
        exit();
    @endphp
@endsection

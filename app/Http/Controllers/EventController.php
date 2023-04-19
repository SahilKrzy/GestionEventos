<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $events = Event::where('user_id', $user_id)->get();

        return view('events.index', ['events' => $events]);
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $event = new Event();
        $event->user_id = $user_id;
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->save();

        return redirect()->route('events.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        $attendees = $event->attendees()->get();

        return view('events.show', ['event' => $event, 'attendees' => $attendees]);
    }

    public function register($id)
    {
        return view('events.register', ['event_id' => $id]);
    }

    public function storeAttendee(Request $request, $idEvent)
    {
        $user_id = Auth::id();

        $attendee = new UserEventsAttendee();
        $attendee->user_id = $user_id;
        $attendee->event_id = $idEvent;
        $attendee->name = $request->input('name');
        $attendee->email = $request->input('email');
        $attendee->save();

        return redirect()->route('events.show', ['id' => $idEvent]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return view('events.edit', ['event' => $event]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->name = $request->input('name');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');
        $event->save();

        return redirect()->route('events.show', ['id' => $id]);
    }
}

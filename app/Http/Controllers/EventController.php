<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\UserEventsAttendee;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    //This function returns a view wih all the events that we have allowed in the database
    public function index()
    {
        $events = Event::all();
        return view('events.show', ['events' => $events]);
    }

    //This function returns the event create form
    public function create()
    {
        return view('events.create');
    }


    //This function recieve the form request and assign every field in the form to every field in our database table to create a new event
    //I'm using try/catch to control if the user leaves an empty field
    public function store(Request $request)
    {
        try {
            $event = new Event();
            $user = auth()->user(); // Obtiene la instancia del usuario autenticado

            $event->title = $request->input('title');
            $event->description = $request->input('description');
            $event->location = $request->input('location');
            $event->date = $request->input('date');
            $event->user_id = $user->id;
            $event->save();

            return redirect("/home");
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Error al guardar el evento']); //Vuelve a la misma vista en la que estabamos indicando que ha ocurrido un error
        }
    }

    //This function recieve an id to show the details of the event on another view
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.showId', compact('event'));
    }

    //This function recieves an id to shows a form filled with the info of the event with this id that the function recieves
    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit', ['event' => $event]);
    }

    //This function execute a put request to edit the event register on the database
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id); // Obtener el evento a partir del ID

        $event->title = $request->input('title');
        $event->description = $request->input('description');
        $event->location = $request->input('location');
        $event->date = $request->input('date');

        $event->save();

        return redirect()->route('events.show', $event->id);
    }

    //This function find an event with the id that the function recieve and finally deletes this event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $eventAttendee = UserEventsAttendee::where('event_id', $id)->get(); //Obtener los campos evento_id que queremos borrar en la tabla user_events_attendees que contengan el id indicado
        $eventAttendee->each->delete();
        $event->delete();
        
        return redirect('/events');
    }

    //This function recieves an event id and returns a view with all users and the event that the user selects.
    public function register($id){
        $event = Event::findOrFail($id);
        $users = User::all();
        return view('events.registerAttende', ['event' => $event, 'users' => $users]);
    }

    //This function finally stores in the user_events_attendee table every attendee that want to go to that event
    public function storeAttendee(Request $request, $id){
        $event_attendee = new UserEventsAttendee();
        $event_attendee->user_id = $request->input('user_id');
        $event_attendee->event_id = $id;
        $event_attendee->save();

        return redirect('/events');
    }
}

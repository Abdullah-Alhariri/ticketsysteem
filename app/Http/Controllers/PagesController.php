<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Models\Car;
use App\Forms\EditEventType;
use App\Models\CalendarEvent;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Kris\LaravelFormBuilder\FormBuilder;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function show_events()
    {
        $events = CalendarEvent::all();
        return view('events', [
            'events' => $events
        ]);
    }

    public function detail_event($id)
    {
        $event = CalendarEvent::findOrFail($id);
        return view('event', [
            'event' => $event
        ]);
    }

    public function process_buy_event($id)
    {
        $event = CalendarEvent::findOrFail($id);
        $ticket = new Ticket();
        $ticket->uuid = Str::uuid()->toString();
        $ticket->event_id = $event->id;
        $ticket->user_id = Auth::user()->id;
        $ticket->save();

        return redirect()->route('tickets');
    }

    public function tickets()
    {
        return view('tickets');
    }

    public function detail_ticket($uuid)
    {
        $ticket = Ticket::where('uuid', $uuid)->firstOrFail();

        return view('ticket', [
            'ticket' => $ticket
        ]);
    }

    public function admin()
    {
        $events = CalendarEvent::all();
        return view('admin', [
            'events' => $events
        ]);
    }

    public function create_event(FormBuilder $formBuilder)
    {
        $event = new CalendarEvent();

        $form = $formBuilder->create(EditEventType::class, [
            'method' => 'POST',
            'url' => route('process_create_event')
        ], $event->getFormFields());

        return view('create_event', compact('form'));
    }

    public function process_create_event(Request $request)
    {
        $event = new CalendarEvent();
        $event->display = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->tickets = $request->available_tickets;
        $event->price = $request->price;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->save();

        return redirect()->route('admin');
    }

    public function edit_event($id, FormBuilder $formBuilder)
    {
        $event = CalendarEvent::findOrFail($id);


        $form = $formBuilder->create(EditEventType::class, [
            'method' => 'POST',
            'url' => route('process_edit_event', ['id' => $id]),
        ], $event->getFormFields());

        return view('create_event', compact('form'));
    }

    public function process_edit_event($id, Request $request)
    {
        $event = CalendarEvent::findOrFail($id);
        $event->display = $request->name;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->tickets = $request->available_tickets;
        $event->price = $request->price;
        $event->location = $request->location;
        $event->description = $request->description;
        $event->save();

        return redirect()->route('admin');
    }

    public function process_delete_event($id) {
        $event = CalendarEvent::findOrFail($id);
        $event->delete();

        return redirect()->route('admin');
    }
}

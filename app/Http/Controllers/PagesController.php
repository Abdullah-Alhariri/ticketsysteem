<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Models\Car;
use App\Forms\EditEventType;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;
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

    public function tickets()
    {
        return view('tickets');
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

//    public function edit(Request $request, CalendarEvent $event)
//    {
//        return view('admin', [
//            'events'=> $events
//        ]);
//    }
//    public function getAllCars(){
//        $allCars = Car::all();
//        $allAudis = Car::where('brand', 'Audi')->get();
//        return view('cars', [
//            'cars' => $allCars,
//            'audis' => $allAudis,
//        ]);
//    }
//
//    public function addCar() {
//        return view('add-car');
//    }
//
//    public function processNewCar(Request $request) {
//        $newCar = new Car();
//        $newCar->brand = $request->brand;
//        $newCar->amount_of_tires = $request->tires;
//        $newCar->description = $request->description;
//        $newCar->release_date = $request->release_date;
//
//        $newCar->save();
//
//        return redirect()->route('cars');
//    }
//
//    public function editCar($id) {
//        $car = Car::findOrFail($id);
//        return view('edit-car', [
//            'car' => $car
//        ]);
//    }
//
//    public function processEditCar(Request $request, $id) {
//        $car = Car::findOrFail($id);
//        $car->brand = $request->brand;
//        $car->amount_of_tires = $request->tires;
//        $car->description = $request->description;
//        $car->release_date = $request->release_date;
//
//        $car->save();
//
//        return redirect()->route('cars');
//    }
//
//    public function deleteCar($id) {
//        $car = Car::findOrFail($id);
//        $car->delete();
//
//        return redirect()->route('cars');
//    }
}

@extends('layouts.main')

@section('content')
    <img src="https://www.zwijsen.nl/app/uploads/2020/10/feestjes-header-shutterstock-1172507485.jpg"
         class="card-img-top rounded" alt="feesje" style="max-height: 250px; width: auto">
        <h2 class="mt-3">{{ $ticket->event->display }}</h2>

        <ul>
            <li>Start Datum: <span>{{ date('d/m/Y', strtotime($ticket->event->start_date)) }}</span></li>
            <li>Eind Datum: <span>{{ date('d/m/Y', strtotime($ticket->event->end_date)) }}</span></li>
            <li>Beschikbare tickets: <span>{{ $ticket->event->tickets }}</span></li>
            <li>Prijs: <span>{{ $ticket->event->price }}</span></li>
            <li>Locatie: <span>{{ $ticket->event->location }}</span></li>
        </ul>
        <p>
            {{ $ticket->event->description }}
        </p>

    {!! QrCode::size(300)->generate($ticket->uuid) !!}

@endsection

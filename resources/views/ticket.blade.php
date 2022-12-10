@extends('layouts.main')

@section('content')
    <img src="https://www.zwijsen.nl/app/uploads/2020/10/feestjes-header-shutterstock-1172507485.jpg"
         class="card-img-top rounded" alt="feesje" style="max-height: 250px; width: auto">
{{--    <h2 class="mt-3">{{ $event->display }}</h2>--}}

{{--    <ul>--}}
{{--        <li>Start Datum: <span>{{ date('d/m/Y', strtotime($event->start_date)) }}</span></li>--}}
{{--        <li>Eind Datum: <span>{{ date('d/m/Y', strtotime($event->end_date)) }}</span></li>--}}
{{--        <li>Beschikbare tickets: <span>{{ $event->tickets }}</span></li>--}}
{{--        <li>Prijs: <span>{{ $event->price }}</span></li>--}}
{{--        <li>Locatie: <span>{{ $event->location }}</span></li>--}}
{{--    </ul>--}}
{{--    <p>--}}
{{--        {{ $event->description }}--}}
{{--    </p>--}}

{{--    <a--}}
{{--        class="btn btn-primary"--}}
{{--        role="button"--}}
{{--        href="{{ Route('process_buy_event', ['id' => $event->id]) }}"--}}
{{--    >--}}
{{--        <i class="fa-solid fa-cart-shopping"></i>--}}
{{--        Reserveer ticket--}}
{{--    </a>--}}
@endsection

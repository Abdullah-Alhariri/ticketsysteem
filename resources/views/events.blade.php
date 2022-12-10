@extends('layouts.main')

@section('content')
    <h1>Events</h1>
    <div class="row g-0" style="gap: 25px">
        @foreach($events as $event )
            <div class="card col-3" style="width: 18rem;">
                <img src="https://www.zwijsen.nl/app/uploads/2020/10/feestjes-header-shutterstock-1172507485.jpg"
                     class="card-img-top" alt="feesje">
                <div class="card-body" >
                    <a href="{{ Route('detail_event', ['id' => $event->id]) }}" class="text-decoration-none">
                        <h5 class="card-title">{{ $event->display }}</h5>
                    </a>
                    <p class="card-text text-truncate">{{ $event->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

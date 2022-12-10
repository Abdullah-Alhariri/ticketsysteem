@extends('layouts.main')

@section('content')
    <h3>Nieuw event</h3>
    <form action="{{ route('process_create_event') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="event_name" class="form-label">Event naam</label>
            <input type="text" class="form-control" id="event_name">
        </div>
        <div class="mb-3">
            <label for="event_name" class="form-label">Event naam</label>
            <input type="text" class="form-control" id="event_name">
        </div>
        <div class="mb-3">
            <label for="event_name" class="form-label">Event naam</label>
            <input type="text" class="form-control" id="event_name">
        </div>
        <button type="submit" class="btn btn-primary">Aanmaken</button>
    </form>
@endsection

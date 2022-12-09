@extends('layouts.main')

@section('content')
    <h1>Events</h1>
    @foreach($events as $event )
        {{$events->display}}
    @endforeach
@endsection

@extends('layouts.main')

@section('content')
    @if($id)
        <h3>Edit event</h3>
    @else
    <h3>Nieuw event</h3>
    @endif

    {!! form($form) !!}
@endsection

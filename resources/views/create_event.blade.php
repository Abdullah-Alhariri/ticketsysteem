@extends('layouts.main')

@section('content')
    @if($form->getdata()['id'])
        <h3>Edit event</h3>
    @else
    <h3>Nieuw event</h3>
    @endif

    {!! form($form) !!}
@endsection

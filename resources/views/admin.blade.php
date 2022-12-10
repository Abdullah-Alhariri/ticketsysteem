@extends('layouts.main')

@section('content')
    <h1>Evenementen</h1>
    @if(count($events))
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Naam</th>
                <th scope="col">Start datum</th>
                <th scope="col">Eind datum</th>
                <th scope="col">Prijs</th>
                <th scope="col">Locatie</th>
                <th scope="col" class="text-end">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <th scope="row">{{ $event->id }}</th>
                    <td>{{ $event->display }}</td>
                    <td>{{ date('d/m/Y', strtotime($event->start_date)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($event->end_date)) }}</td>
                    <td>{{ $event->price }}</td>
                    <td>{{ $event->location }}</td>
                    <td class="text-end">
                        <a
                            class="btn btn-primary"
                            role="button"
                            href="{{ Route('edit_event', ['id' => $event->id]) }}"
                        >
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a
                            class="btn btn-danger"
                            role="button"
                            href="{{ Route('process_delete_event', ['id' => $event->id]) }}"
                        >
                            <i class="fa-solid fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info" role="alert">
            Er zijn nog geen evenementen!
        </div>
    @endif
    <a
        class="btn btn-primary"
        role="button"
        href="{{ Route('create_event') }}"
    >
        <i class="fa-solid fa-plus"></i>
        Nieuw
        {{--        <i class="fa-solid fa-pen-to-square"></i>--}}
    </a>
@endsection

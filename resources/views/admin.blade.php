@extends('layouts.main')

@section('content')
    <h1>Evenementen</h1>
    @if(count($events))
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col" class="text-end">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td class="text-end">
                        <a
                            class="btn btn-primary"
                            role="button"
                            href="{{ Route('create_event') }}"
                        >
                            <i class="fa-solid fa-pen-to-square"></i>
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

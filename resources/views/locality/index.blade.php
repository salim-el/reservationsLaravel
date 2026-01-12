@extends('layouts.main')

@section('title', 'Liste des localités')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
        @foreach($localities as $l)
            <li>
                <a href="{{ route('locality.show', $l->id) }}">
                    {{ $l->postal_code }} {{ $l->locality }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection

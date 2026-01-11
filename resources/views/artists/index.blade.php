@extends('layouts.app')

@section('title', 'Liste des artistes')

@section('content')
    <h1>Liste des artistes</h1>

    @if($artists->isEmpty())
        <p>Aucun artiste.</p>
    @else
        <ul>
            @foreach($artists as $artist)
                <li>
                    <a href="/artists/{{ $artist->id }}">
                        {{ $artist->firstname }} {{ $artist->lastname }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@extends('layouts.main')

@section('title', 'Détails de la localité')

@section('content')
    <h1>Localité : {{ $locality->postal_code }} {{ $locality->locality }}</h1>

    <h2>Lieux de spectacle dans cette localité</h2>

    @if($locality->locations->count() > 0)
        <ul>
            @foreach($locality->locations as $loc)
                <li>
                    <a href="{{ route('location.show', $loc->id) }}">
                        {{ $loc->designation }}
                    </a>
                    @if($loc->website)
                        - <a href="{{ $loc->website }}">{{ $loc->website }}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucun lieu trouvé pour cette localité.</p>
    @endif
@endsection

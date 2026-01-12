@extends('layouts.main')

@section('title', 'Types')

@section('content')
    <h1>Liste des types</h1>

    @if ($types->isEmpty())
        <p>Aucun type trouvé.</p>
    @else
        <ul>
            @foreach ($types as $type)
                <li>
                    <a href="{{ route('type.show', $type->id) }}">
                        {{ $type->type }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@extends('layouts.main')

@section('title', 'Type')

@section('content')
    <h1>Détail du type</h1>

    <p>
        <strong>ID :</strong> {{ $type->id }}
    </p>

    <p>
        <strong>Type :</strong> {{ $type->type }}
    </p>

    <p>
        <a href="{{ route('type.index') }}">← Retour à la liste</a>
    </p>
@endsection

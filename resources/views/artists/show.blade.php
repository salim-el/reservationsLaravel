@extends('layouts.app')

@section('title', 'Détail artiste')

@section('content')
    <h1>Détail de l’artiste</h1>

    @if($artist)
        <p><strong>Prénom :</strong> {{ $artist->firstname }}</p>
        <p><strong>Nom :</strong> {{ $artist->lastname }}</p>
    @else
        <p>Artiste introuvable.</p>
    @endif

    <a href="/artist">← Retour à la liste</a>
@endsection

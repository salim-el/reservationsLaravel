@extends('layouts.main')

@section('title', 'Fiche d\'un prix')

@section('content')
    <h1>{{ ucfirst($price->type) }}</h1>

    <p><strong>Prix :</strong> {{ $price->price }} €</p>
    <p><strong>Description :</strong> {{ $price->description }}</p>
    <p><strong>Début :</strong> {{ $price->start_date }}</p>
    <p><strong>Fin :</strong> {{ $price->end_date ?? '—' }}</p>

    <nav><a href="{{ route('price.index') }}">Retour à l'index</a></nav>
@endsection

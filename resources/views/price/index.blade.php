@extends('layouts.main')

@section('title', 'Liste des prix')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <ul>
        @foreach($prices as $price)
            <li>
                <a href="{{ route('price.show', $price->id) }}">
                    {{ ucfirst($price->type) }} - {{ $price->price }} €
                </a>
            </li>
        @endforeach
    </ul>
@endsection

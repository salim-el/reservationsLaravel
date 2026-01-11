@extends('layouts.app')

@section('title', 'Modifier un artiste')

@section('content')
    <h1>Modifier l'artiste</h1>

    @if(!$artist)
        <p>Artiste introuvable.</p>
    @else
        <form method="POST" action="{{ route('artist.update', $artist->id) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="firstname">Firstname</label>
                <input id="firstname" name="firstname" type="text"
                       value="{{ old('firstname', $artist->firstname) }}" maxlength="60" required>
                @error('firstname') <div>{{ $message }}</div> @enderror
            </div>

            <div>
                <label for="lastname">Lastname</label>
                <input id="lastname" name="lastname" type="text"
                       value="{{ old('lastname', $artist->lastname) }}" maxlength="60" required>
                @error('lastname') <div>{{ $message }}</div> @enderror
            </div>

            <button type="submit">Enregistrer</button>
        </form>

        <p><a href="{{ route('artist.show', $artist->id) }}">Annuler</a></p>
    @endif
@endsection

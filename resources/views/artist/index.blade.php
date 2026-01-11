@extends('layouts.main')

@section('title', 'Artists')

@section('content')
    <h1>Artists</h1>

    <p><a href="{{ route('artist.create') }}">Create new artist</a></p>

    @if($artists->isEmpty())
        <p>No artists found.</p>
    @else
        <ul>
            @foreach($artists as $artist)
                <li>
                    <a href="{{ route('artist.show', $artist->id) }}">
                        {{ $artist->firstname }} {{ $artist->lastname }}
                    </a>
                    -
                    <a href="{{ route('artist.edit', $artist->id) }}">Edit</a>

                    <form method="POST" action="{{ route('artist.delete', $artist->id) }}" style="display:inline"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

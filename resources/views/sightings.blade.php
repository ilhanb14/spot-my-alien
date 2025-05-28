@extends('partials.header')
@section('title', 'UFO waarnemingen')

@section('content')

    <div class="container mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold mb-8 text-center">Eerdere UFO-waarnemingen</h1>
        <div class="space-y-6">
            @foreach ($sightings as $sighting)
                <div class="border border-gray-700 p-4 rounded-md bg-gray-800">
                    <p><strong>Datum:</strong> {{ $sighting['date_time'] }}</p>
                    <p><strong>Locatie:</strong> {{ $sighting['location'] }}</p>
                    <p><strong>Beschrijving:</strong> {{ $sighting['description'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-blue-400 hover:underline">← Terug naar startpagina</a>
        </div>
    </div>

@endsection
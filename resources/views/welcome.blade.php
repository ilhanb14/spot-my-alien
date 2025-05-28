@extends('partials.header')
@section('title', 'Spot my alien')

@section('content')

    <!-- Hero Sectie -->
    <div class="relative bg-gray-800">
        <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-center sm:text-5xl lg:text-6xl">
                UFO Waarnemingen in België
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-400 text-center">
                Documenteer en deel onverklaarde luchtverschijnselen in ons land. Dé community voor Belgische hemelwachters.
            </p>
            <div class="mt-10 flex justify-center gap-3">
                <a href="{{ route('sightings') }}" class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg font-medium">
                    Bekijk Waarnemingen
                </a>
                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg font-medium">
                    Aanmelden
                </a>
            </div>
        </div>
    </div>

    <!-- Uitgelichte Waarnemingen -->
    <div class="max-w-7xl mx-auto py-16 sm:py-24 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-12 text-center">Uitgelichte Waarnemingen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($featuredSightings as $sighting)
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="{{ $sighting->image_url ?: 'https://source.unsplash.com/800x600/?ufo,sky' }}" 
                     class="h-48 w-full object-cover"
                     alt="UFO waarneming in {{ $sighting->location }}">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-semibold">{{ $sighting->location }}</h3>
                        <span class="text-xs bg-blue-600 text-white px-2 py-1 rounded-full">
                            {{ $sighting->status->name ?? 'Bevestigd' }}
                        </span>
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">
                        {{ \Carbon\Carbon::parse($sighting->date_time)->format('d F Y') }} · {{ $sighting->location }}
                    </p>
                    <p class="mt-4 text-gray-300">
                        {{ \Illuminate\Support\Str::limit($sighting->description, 100) }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Statistieken -->
    <div class="bg-gray-800 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-gray-700 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-blue-500">200+</div>
                    <div class="mt-2 text-gray-300">Gemelde Waarnemingen</div>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-blue-500">45+</div>
                    <div class="mt-2 text-gray-300">Aliens gezien</div>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg">
                    <div class="text-4xl font-bold text-blue-500">85%</div>
                    <div class="mt-2 text-gray-300">Onverklaard</div>
                </div>
            </div>
        </div>
    </div>

@endsection
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>UFO Waarnemingen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <nav class="bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0 text-2xl font-bold">
                        🛸 SpotMyAlien
                    </a>
                    <div class="hidden md:block ml-10">
                        <div class="flex space-x-4">
                            <a href="{{ route('home') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md">Home</a>
                            <a href="{{ route('sightings') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md">Archief</a>
                            <a href="{{ route('about') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md">Over Ons</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold mb-8 text-center">Eerdere UFO-waarnemingen</h1>
        <div class="space-y-6">
            @foreach ($sightings as $sighting)
                <div class="border border-gray-700 p-4 rounded-md bg-gray-800">
                    <p><strong>Datum:</strong> {{ $sighting['date'] }}</p>
                    <p><strong>Locatie:</strong> {{ $sighting['location'] }}</p>
                    <p><strong>Beschrijving:</strong> {{ $sighting['description'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-blue-400 hover:underline">← Terug naar startpagina</a>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
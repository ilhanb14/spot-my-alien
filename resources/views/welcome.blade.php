<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotMyAlien - Belgische UFO Waarnemingen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">
    <!-- Navigatie -->
    <nav class="bg-gray-800 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex-shrink-0 text-2xl font-bold">
                        🛸 SpotMyAlien
                    </a>
                    <div class="hidden md:block ml-10">
                        <div class="flex space-x-4">
                            <a href="{{ route('sightings') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md">Recent</a>
                            <a href="{{ route('sightings') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md">Archief</a>
                            <a href="{{ route('about') }}" class="text-gray-300 hover:bg-gray-700 px-3 py-2 rounded-md">Over Ons</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Sectie -->
    <div class="relative bg-gray-800">
        <div class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-center sm:text-5xl lg:text-6xl">
                UFO Waarnemingen in België
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-400 text-center">
                Documenteer en deel onverklaarde luchtverschijnselen in ons land. Dé community voor Belgische hemelwachters.
            </p>
            <div class="mt-10 flex justify-center">
                <a href="{{ route('sightings') }}" class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-lg font-medium">
                    Bekijk Waarnemingen
                </a>
            </div>
        </div>
    </div>

    <!-- Uitgelichte Waarnemingen -->
    <div class="max-w-7xl mx-auto py-16 sm:py-24 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-12 text-center">Bekende Belgische Gevallen</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Waarneming 1 -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/800x600/?belgium,night-sky" 
                     class="h-48 w-full object-cover"
                     alt="Belgische UFO Waarneming">
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <h3 class="text-xl font-semibold">De Belgische Golf (1989-1990)</h3>
                        <span class="text-xs bg-blue-600 text-white px-2 py-1 rounded-full">Bevestigd</span>
                    </div>
                    <p class="mt-2 text-gray-400 text-sm">
                        November 1989 - Maart 1990 · Heel België
                    </p>
                    <p class="mt-4 text-gray-300">
                        Meer dan 2000 meldingen van driehoekige UFO's vastgelegd door burgers en militaire radar.
                    </p>
                </div>
            </div>

            <!-- Waarneming 2 -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/800x600/?mechelen,belgium" 
                     class="h-48 w-full object-cover"
                     alt="Belgische UFO Waarneming">
                <div class="p-6">
                    <h3 class="text-xl font-semibold">Mechelen Incident (1975)</h3>
                    <p class="mt-2 text-gray-400 text-sm">
                        15 augustus 1975 · Mechelen
                    </p>
                    <p class="mt-4 text-gray-300">
                        Politieagenten zagen een zwevend schotelvormig object boven de Dijle.
                    </p>
                </div>
            </div>

            <!-- Waarneming 3 -->
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                <img src="https://source.unsplash.com/800x600/?brussels,night" 
                     class="h-48 w-full object-cover"
                     alt="Belgische UFO Waarneming">
                <div class="p-6">
                    <h3 class="text-xl font-semibold">Brussels Licht (2008)</h3>
                    <p class="mt-2 text-gray-400 text-sm">
                        13 december 2008 · Brussel
                    </p>
                    <p class="mt-4 text-gray-300">
                        Groep studenten filmde pulserende lichten boven het Europese parlement.
                    </p>
                </div>
            </div>
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

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Over SpotMyAlien</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen">
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

    <div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold mb-8 text-center">👽 Over Ons</h1>
        
        <div class="space-y-8">
            <div class="bg-gray-800 p-6 rounded-lg">
                <h2 class="text-2xl font-bold text-blue-400 mb-4">Wie Zijn Wij?</h2>
                <p class="text-lg">
                    Vier studenten van Syntra PXL Genk met een passie voor het onverklaarbare! 
                    Wij geloven dat België meer UFO's heeft dan frietkoten 🍟
                </p>
            </div>

            <div class="bg-gray-800 p-6 rounded-lg text-center">
                <h2 class="text-2xl font-bold text-blue-400 mb-4">Steun Ons</h2>
                <button class="bg-green-500 hover:bg-green-600 px-8 py-3 rounded-lg font-medium">
                    🚀 Doneer Nu
                </button>
                <p class="text-sm text-gray-400 mt-2">(Voor meer koffie tijdens nachtelijke UFO-jachten)</p>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
@extends('partials.header')
@section('title', 'Over ons')

@section('content')

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
                <a href="/doneer" class="inline-block bg-green-500 hover:bg-green-600 px-8 py-3 rounded-lg font-medium text-white text-center">
                    🚀 Doneer Nu
                </a>
                <p class="text-sm text-gray-400 mt-2">(Voor meer koffie tijdens nachtelijke UFO-jachten)</p>
            </div>
        </div>
    </div>
    
@endsection
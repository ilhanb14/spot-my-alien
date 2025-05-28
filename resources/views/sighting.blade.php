@extends('partials.header')
@section('title', 'Meld een waarneming')

@section('content')
    <div class="container mx-auto py-12 px-4">
        <h1 class="text-3xl font-bold mb-8 text-center">Meld een nieuwe waarneming</h1>
        <div class="space-y-6">
             @livewire('sighting-registration')
        </div>
        <div class="mt-8 text-center">
            <a href="{{ route('home') }}" class="text-blue-400 hover:underline">← Terug naar startpagina</a>
        </div>
    </div>
@endsection
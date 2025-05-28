@extends('partials.header')
@section('title', 'Log In')

@section('content')
<div class="max-w-4xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
<div class="space-y-8">
    <div class="bg-gray-800 p-6 rounded-lg">
        <h1 class="text-4xl font-bold mb-8 text-center">Log In</h1>
        <form action='{{ url('/login') }}' method='POST' class="space-y-4 max-w-md mx-auto mb-4">
            @csrf

            <div class="flex flex-col">
                <label for="email" class="mb-1 font-medium">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-gray-300 rounded px-3 py-2">
                @error('email')
                    <span class="text-red-500 text-sm mt-1 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="password" class="mb-1 font-medium">Wachtwoord:</label>
                <input type="password" id="password" name="password" class="border border-gray-300 rounded px-3 py-2">
                @error('password')
                    <span class="text-red-500 text-sm mt-1 font-bold">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Inloggen
                </button>
            </div>
        </form>
        Heeft u nog geen account? <a href='{{ url('/registreer') }}' class='text-green-400 hover:font-bold'> Registreer! </a> <br>
    </div>
</div>
</div>
@endsection
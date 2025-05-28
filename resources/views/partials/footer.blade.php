<footer class="bg-gray-800 mt-24">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center text-gray-400">
            <p>🇧🇪 Documenteren van Belgische mysteries sinds 2023</p>
            <p class="mt-4">&copy; 2023 SpotMyAlien. Alle rechten voorbehouden.</p>
        </div>
    </div>
    @auth
    <form method="POST" action="{{ url('/loguit') }}" class='flex justify-center pb-8'>
    @csrf
    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-lg">
        Loguit
    </button>
    @endauth
</form>
</footer>
@livewireScripts
</body>
</html>
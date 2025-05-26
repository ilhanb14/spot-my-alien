<form action='{{ url('/login') }}' method='POST'>
    @csrf

    Email:<input type='email' id='email' name='email' value='{{ old('email') }}'> <br>
    @error('email')
        <span>{{ $message }}</span> <br>
    @enderror

    Wachtwoord: <input type='password' id='password' name='password'> <br>
    @error('password')
        <span>{{ $message }}</span> <br>
    @enderror

    <button type="submit">
        Inloggen
    </button>
</form>
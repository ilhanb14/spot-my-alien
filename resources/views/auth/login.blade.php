<form action='{{ url('/login') }}' method='POST'>
    @csrf

    Email:<input type='email' id='email' name='email' value='{{ old('email') }}'> <br>
    @error('email')
        <span>Error: {{ $message }}</span> <br>
    @enderror

    Password: <input type='password' id='password' name='password'> <br>
    @error('password')
        <span>Error: {{ $message }}</span> <br>
    @enderror

    <button type="submit">
        Login
    </button>
</form>
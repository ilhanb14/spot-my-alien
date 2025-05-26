<form action='{{ url('/register')}}' method='POST'>
    @csrf

    Naam:<input type='text' id='name' name='name' value='{{ old('name') }}'> <br>
    @error('name')
        <span>{{ $message }}</span> <br>
    @enderror

    Email:<input type='email' id='email' name='email' value='{{ old('email') }}'> <br>
    @error('email')
        <span>{{ $message }}</span> <br>
    @enderror

    Wachtwoord: <input type='password' id='password' name='password'> <br>
    @error('password')
        <span>{{ $message }}</span> <br>
    @enderror
    Bevestig Wachtwoord: <input type='password' id='confirm_password' name='confirm_password'> <br>
    @error('confirm_password')
        <span>{{ $message }}</span> <br>
    @enderror

    <button type="submit">
        Registreren
    </button>
</form>

<!-- Display message after successful registration -->
@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif
<form action='{{ url('/register')}}' method='POST'>
    @csrf

    Name:<input type='text' id='name' name='name' value='{{ old('name') }}'> <br>
    @error('name')
        <span>Error: {{ $message }}</span> <br>
    @enderror

    Email:<input type='email' id='email' name='email' value='{{ old('email') }}'> <br>
    @error('email')
        <span>Error: {{ $message }}</span> <br>
    @enderror

    Password: <input type='password' id='password' name='password'> <br>
    @error('password')
        <span>Error: {{ $message }}</span> <br>
    @enderror
    Confirm Password: <input type='password' id='confirm_password' name='confirm_password'> <br>
    @error('confirm_password')
        <span>Error: {{ $message }}</span> <br>
    @enderror

    <button type="submit">
        Register
    </button>
</form>

<!-- Display message after successful registration -->
@if(session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif
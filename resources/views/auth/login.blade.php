<form method="POST" action="{{ route('login') }}">
    @csrf

    <input type="text" name="login" placeholder="Username или Email">
    @error('login') <div>{{ $message }}</div> @enderror

    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>
</form>

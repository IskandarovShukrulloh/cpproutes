<form method="POST" action="{{ route('register') }}">
    @csrf

    <input type="text" name="fullname" placeholder="Full Name">
    <input type="text" name="username" placeholder="Username">
    <input type="email" name="email" placeholder="Email">

    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password_confirmation" placeholder="Confirm Password">

    <button type="submit">Register</button>
</form>

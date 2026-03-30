<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
<header class="header">
    <div>Admin Panel</div>
    <div>
        <a href="{{ route('users.index') }}" target="_blank">Users</a>
        <a href="{{ route('modules.index') }}" target="_blank">Modules</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="background:none;border:none;color:#fff;cursor:pointer;">Logout</button>
        </form>
    </div>
</header>

<main class="main">
    <h1>Welcome, Admin!</h1>
    <div class="cards">
        <a href="{{ route('users.index') }} " target="_blank" class="card">
            <h2>Users</h2>
            <p>View and manage all users in the system.</p>
        </a>

        <a href="{{ route('modules.index') }}" target="_blank" class="card">
            <h2>Modules</h2>
            <p>Check and manage all lesson modules here.</p>
        </a>
    </div>
</main>

<footer class="footer">
    &copy; {{ date('Y') }} MyApp. All rights reserved.
</footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<header class="header">
    <div class="logo">MyApp</div>
    <nav class="nav">
        <ul>
            <li><a href="{{ route('admin-panel') }}">Admin Panel</a></li>
        </ul>
    </nav>
</header>

<main class="main">
    <h1>Welcome to MyApp</h1>
    <p>This is your homepage. Manage your content from the navigation above.</p>


</main>

<footer class="footer">
    &copy; {{ date('Y') }} MyApp. All rights reserved.
</footer>
</body>
</html>

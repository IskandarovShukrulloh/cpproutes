<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1f2937;
            color: #fff;
            padding: 1rem 2rem;
        }

        header a, header button, header span {
            color: #fff;
            text-decoration: none;
            margin-left: 1rem;
            font-weight: 500;
        }

        header button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .card {
            background-color: #fff;
            border-radius: 12px;
            padding: 1.5rem;
            text-decoration: none;
            color: #1f2937;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card h2 {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
        }

        .card p {
            font-size: 0.95rem;
            color: #6b7280;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        main h1 {
            font-weight: 600;
            color: #1f2937;
        }

        footer {
            text-align: center;
            margin: 4rem 0 1rem 0;
            color: #6b7280;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<header>
    <div>
        <a class="btn btn-primary" href="{{ route('home') }}">Home</a>
    </div>
    <div>
        <span>{{ auth()->user()->fullname }} (Admin)</span>
        <a href="{{ route('users.index') }}">Users</a>
        <a href="{{ route('modules.index') }}">Modules</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</header>

<main class="container mt-4">
    <h1>Welcome, {{ auth()->user()->fullname }}!</h1>

    <div class="cards">
        <a href="{{ route('users.index') }}" class="card">
            <h2>Users</h2>
            <p>View, edit, and manage all users in the system.</p>
        </a>

        <a href="{{ route('modules.index') }}" class="card">
            <h2>Modules</h2>
            <p>Check and manage all lesson modules here.</p>
        </a>

{{--        <a href="#" class="card">--}}
{{--            <h2>Reports</h2>--}}
{{--            <p>Generate reports and analytics for the platform.</p>--}}
{{--        </a>--}}

{{--        <a href="#" class="card">--}}
{{--            <h2>Settings</h2>--}}
{{--            <p>Update platform settings and configuration.</p>--}}
{{--        </a>--}}
    </div>
</main>

<footer>
    &copy; {{ date('Y') }} CppRoutes. All rights reserved.
</footer>
</body>
</html>

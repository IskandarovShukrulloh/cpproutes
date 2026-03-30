<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <!-- Слева: кнопка Home -->
        <a class="navbar-brand btn btn-primary text-white me-3" href="{{ route('home') }}">CppRoutes</a>

        <div class="collapse navbar-collapse">


            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endguest

                    @auth
                        <li class="nav-item">
                            <span class="nav-link">
                                {{ auth()->user()->fullname }}
                                (<a href="{{ route('profile') }}" class="text-decoration-none text-light">{{ auth()->user()->username }}</a>)
                            </span>
                        </li>
                        @if(auth()->user()->role === \App\Enums\UserRole::ADMIN)
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin-panel') }}">Admin Panel</a></li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')


</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blank Space Brews — @yield('title', 'Coffee')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --onyx: #121212;
            --off-white: #F7F7F7;
            --muted-gray: #888888;
            --latte: #E3C29F;
            --latte-dark: #C9A47E;
            --surface: #1C1C1C;
            --surface2: #242424;
            --border: #2A2A2A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--onyx);
            color: var(--off-white);
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            min-height: 100vh;
        }

        /* NAV */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 3rem;
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            background: rgba(18,18,18,0.95);
            backdrop-filter: blur(12px);
            z-index: 100;
        }

        .nav-brand {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--off-white);
            text-decoration: none;
            letter-spacing: 0.04em;
        }

        .nav-brand span {
            color: var(--latte);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
            list-style: none;
        }

        .nav-links a {
            color: var(--muted-gray);
            text-decoration: none;
            font-size: 0.875rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: color 0.2s;
        }

        .nav-links a:hover {
            color: var(--latte);
        }

        .btn-primary {
            background: var(--latte);
            color: var(--onyx);
            border: none;
            padding: 0.6rem 1.5rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s, transform 0.1s;
        }

        .btn-primary:hover {
            background: var(--latte-dark);
            color: var(--onyx);
            transform: translateY(-1px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--off-white);
            border: 1px solid var(--border);
            padding: 0.6rem 1.5rem;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            font-weight: 400;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: border-color 0.2s, color 0.2s;
        }

        .btn-ghost:hover {
            border-color: var(--latte);
            color: var(--latte);
        }

        /* ALERT */
        .alert {
            padding: 0.875rem 1.25rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            border-left: 3px solid;
        }

        .alert-success {
            background: rgba(227, 194, 159, 0.08);
            border-color: var(--latte);
            color: var(--latte);
        }

        .alert-danger {
            background: rgba(220, 80, 80, 0.08);
            border-color: #DC5050;
            color: #DC5050;
        }

        .alert-warning {
            background: rgba(227, 194, 159, 0.08);
            border-color: var(--latte);
            color: var(--muted-gray);
        }

        footer {
            text-align: center;
            padding: 2rem;
            border-top: 1px solid var(--border);
            color: var(--muted-gray);
            font-size: 0.8rem;
            letter-spacing: 0.04em;
            margin-top: auto;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav>
        <a href="{{ url('/') }}" class="nav-brand">Blank<span>Space</span> Brews☕</a>
        <ul class="nav-links">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}" class="btn-primary">Join Us</a></li>
            @else
                <li><a href="{{ route('home') }}">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display:inline">
                        @csrf
                        <button type="submit" class="btn-ghost">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© {{ date('Y') }} Blank Space Brews · All rights reserved</p>
    </footer>

    @yield('scripts')
</body>
</html>
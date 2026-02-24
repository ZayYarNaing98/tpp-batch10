<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        /* Sidebar */
        #sidebar {
            width: 240px;
            min-height: calc(100vh - 56px);
            background-color: #2c3e50;
            position: fixed;
            top: 56px;
            left: 0;
            z-index: 100;
            padding-top: 1rem;
            transition: all 0.3s;
        }

        #sidebar .nav-link {
            color: #ced4da;
            padding: 0.6rem 1.25rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border-left: 3px solid transparent;
            transition: all 0.2s;
        }

        #sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.08);
            border-left-color: #3498db;
        }

        #sidebar .nav-link.active {
            color: #fff;
            background-color: rgba(52, 152, 219, 0.2);
            border-left-color: #3498db;
        }

        #sidebar .sidebar-heading {
            color: #6c757d;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 1rem 1.25rem 0.4rem;
        }

        #sidebar .nav-link i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        /* Main content offset */
        #main-content {
            padding: 1.5rem;
            min-height: calc(100vh - 56px);
        }

        #main-content.with-sidebar {
            margin-left: 240px;
        }

        /* Navbar */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 200;
        }

        /* Sidebar toggle button visible on mobile */
        @media (max-width: 767.98px) {
            #sidebar {
                left: -240px;
            }

            #sidebar.show {
                left: 0;
            }

            #main-content.with-sidebar {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <!-- Sidebar toggle button -->
                <button class="btn btn-sm btn-outline-secondary me-2 d-md-none" id="sidebarToggle" type="button">
                    <i class="bi bi-list"></i>
                </button>

                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <i class="bi bi-box-seam me-1"></i>{{ config('app.name', 'Laravel') }}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="d-flex">
            <!-- Sidebar (auth only) -->
            @auth
                @include('layouts.sidebar')
            @endauth

            <!-- Main Content -->
            <div id="main-content" class="flex-grow-1 @auth with-sidebar @endauth">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        // Sidebar toggle for mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function () {
                document.getElementById('sidebar').classList.toggle('show');
            });
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @yield('styles')
</head>
<body class="bg-gray-100">
    <header class=" shadow w-auto bg-black h-32">
        <div class="container h-full   justify-items-center text-center mx-auto pb-4 px-6 flex justify-between items-center">
            <h1 class="text-2xl text-white font-bold">E-Learning App</h1>
            <nav >
                <ul class="flex space-x-4">
                    @guest
                        <li><a href="{{ route('login') }}" class="text-white hover:text-blue-500">Login</a></li>
                        <li><a href="{{ route('register') }}" class="text-white hover:text-blue-500">Register</a></li>
                    @else
                        @if(auth()->user()->isAdmin())
                            <li><a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-500">Admin Dashboard</a></li>
                            <li><a href="{{ route('courses.index') }}" class="text-gray-700 hover:text-blue-500">Courses</a></li>
                        @else
                            <li><a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-500">Dashboard</a></li>
                        @endif
                        <li><a href="{{ route('logout') }}" class="text-gray-700 hover:text-red-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </ul>
            </nav>
        </div>
    </header>

    <main class="py-6">
        @yield('content')
    </main>

    <footer class="bg-gray-200 py-4">
        <div class="container mx-auto text-center">
            <p class="text-gray-600">&copy; {{ date('Y') }} E-Learning App. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>

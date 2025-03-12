<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-hanken-grotesk pb-20">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10">
        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
            </a>
        </div>

        <div class="space-x-6 font-bold">
            <a href="/">Jobs</a>
            <a href="#">Careers</a>
            <a href="#">Salaries</a>
            <a href="#">Companies</a>
        </div>

        @auth
            <div class="space-x-6 font-bold flex">
                <a href="/jobs/create">Post a Job</a>

                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')

                    <div class="relative ml-3">
                        <div>
                            <button type="button"
                                    class="relative flex rounded-full bg-gray-800 text-sm focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true"
                                    onclick="toggleDropdown()">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="size-8 rounded-full"
                                     src="{{ asset(Auth::user()->employer->logo)}}"
                                     alt="">
                            </button>
                        </div>

                        <!-- Dropdown menu -->
                        <div id="user-dropdown"
                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 ring-1 shadow-lg ring-black/5 focus:outline-hidden hidden"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                               tabindex="-1"
                               id="user-menu-item-0">Your Profile</a>
                            <button class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-2">Log out
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endauth

        @guest
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Up</a>
                <a href="/login">Log In</a>
            </div>
        @endguest
    </nav>

    <main class="mt-10 max-w-[986px] mx-auto">
        {{ $slot }}
    </main>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('user-dropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close the dropdown if clicked outside
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('user-dropdown');
        const button = document.getElementById('user-menu-button');

        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
</body>
</html>

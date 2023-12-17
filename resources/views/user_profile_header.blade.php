<!-- resources/views/user_profile_header.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap">

    <title>User Profile Header</title>
</head>
<body class="font-sans bg-gray-100">

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center py-4">
            <a href="#" class="text-black-500 font-bold text-lg hidden md:block"><img style="width: 3.75rem; height: 3.75rem;" src="{{asset("images/study sphere logo.png")}}" alt=""></a>
            <div class="md:hidden">
                <button id="mobileMenuButton">
                    <svg class="w-6 h-6 text-black-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden md:flex space-x-4">
                <a href="{{route('chatify')}}" class="text-black-500 font-medium hover:text-black-700">Chat</a>
                <a href="{{ route("display") }}" class="text-black-500 font-medium hover:text-black-700">Cours</a>
                <a href="{{route("feeed")}}" class="text-black-500 font-medium hover:text-black-700">Feed</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="md:hidden"></a>
                <a href="{{ route('profiles.create', ['id' => $user->id]) }}">
                    <img src="{{ $photoPath ? asset($photoPath) : asset('images/noprofile.png') }}" alt="User Picture" style="width: 3.75rem; height: 3.75rem;" class="object-cover rounded-full cursor-pointer">
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-black-500 font-medium hover:text-black-700">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <div id="mobileMenu" class="md:hidden bg-white">
        <a href="{{route('chatify')}}" class="block py-2 px-4 text-black-500 font-medium hover:text-black-700">Chat</a>
        <a href="#" class="block py-2 px-4 text-black-500 font-medium hover:text-black-700">Cours</a>
        <a href="{{route('feeed')}}" class="block py-2 px-4 text-black-500 font-medium hover:text-black-700">Feed</a>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="block py-2 px-4 text-black-500 font-medium hover:text-black-700">Logout</a>
        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

    <script>
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>

</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram-like Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="bg-white shadow-md mt-8 p-8">

    <!-- Profile Header -->
    <div class="flex items-center">
        <img src="chemin/vers/votre/photo.jpg" alt="Photo de profil" class="w-32 h-32 rounded-full mr-8">
        <div>
            <h1 class="text-2xl font-semibold">Nom d'utilisateur</h1>
            <p class="text-gray-600">Nom Complet</p>
        </div>
    </div>

    <!-- Bio Section -->
    <div class="mt-4">
        <p class="text-gray-700">Bio: Description courte de vous-même.</p>
    </div>

    <!-- Posts Section -->
    <div class="grid grid-cols-3 gap-4 mt-8">
        <div class="w-full mb-4">
            <img src="path/to/post1.jpg" alt="Post 1" class="w-full h-auto rounded-lg shadow-md">
        </div>
        <div class="w-full mb-4">
            <img src="path/to/post2.jpg" alt="Post 2" class="w-full h-auto rounded-lg shadow-md">
        </div>
        <div class="w-full mb-4">
            <img src="path/to/post3.jpg" alt="Post 3" class="w-full h-auto rounded-lg shadow-md">
        </div>
    </div>
</div>

</body>
</html> --}}













<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram-like Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="bg-white shadow-md mt-8 p-8">

    <!-- Profile Header -->
    <div class="flex items-center">
        <img src="{{ ($utilisateur->profile)->photo }}" alt="Photo de profil" class="w-32 h-32 rounded-full mr-8">
        <div>
            <h1 class="text-2xl font-semibold">{{ $utilisateur->username }}</h1>
            <p class="text-gray-600">{{ $utilisateur->nom }} {{ $utilisateur->prenom ?? '' }}</p>
        </div>
    </div>

    <!-- Bio Section -->
    <div class="mt-4">
        <p class="text-gray-700">Bio:{{ ($utilisateur->profile)->bio }}</p>
    </div>

    <!-- Posts Section -->
    <div class="grid grid-cols-3 gap-4 mt-8">
        @foreach(Auth::user()->posts as $post)
        <div class="w-full mb-4">
            <img src="{{ ($utilisateur->$post)->file_path }}" alt="Post" class="w-full h-auto rounded-lg shadow-md">
        </div>
        @endforeach
    </div>
</div>

</body>
</html>

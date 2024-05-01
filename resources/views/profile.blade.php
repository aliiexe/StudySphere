<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de l'utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('user_profile_header', ['user' => $user])
<div class="container bg-white shadow-md mt-8 p-8">
    @auth
    <div class="flex items-center mb-4">
        @if(isset($profile) && isset($profile->photo))
            <img id="profileImage" src="{{ asset('storage/' . $profile->photo) }}" alt="Photo de profil" class="rounded-full w-60 h-60 p-5">
        @else
            <img id="profileImage" src="{{ asset('images/noprofil.png') }}" alt="Photo de profil par défaut" class="rounded-full w-60 h-60 p-5">
        @endif

        @if(isset($utilisateur))
                <div class="flex flex-col ml-2">
                    <div class="text-2xl font-bold">@&nbsp;{{ $utilisateur->username }}</div>
                    <p class="text-gray-600">{{ $utilisateur->nom }} {{ $utilisateur->prenom ?? '' }}</p>
                    <a href="{{ route('profiles.create', ['id' => $utilisateur->id]) }}" class="inline-block bg-blue-500 text-white font-bold py-2 px-4 rounded-full text-xs mt-2">
                        Modifier le profil
                    </a>

                </div>
            </div>
        @endif
        @if(isset($profile))
            <p class="text-gray-700 mt-2 ml-5"><strong>{{ $profile->bio }}</strong> </p>
        @endif
            @if($utilisateur->posts->isNotEmpty())
                <div class="grid grid-cols-3 gap-4 mt-8">
                    @foreach($utilisateur->posts as $post)
                        <div class="w-full mb-4">
                            <img src="{{ asset('storage/' . $post->file_path) }}" alt="Post" class="w-full h-auto rounded-lg shadow-md">
                        </div>
                    @endforeach
                </div>
            @else
                <p class="mt-4 text-muted">Aucun post trouvé pour cet utilisateur.</p>
            @endif


    @else
        <p class="mt-4">Veuillez vous connecter pour voir le profil.</p>
    @endauth
</div>

</body>
</html>


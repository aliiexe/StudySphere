<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gradient">
    @include('user_profile_header', ['user' => $user])
    <div class="container max-w-2xl mx-auto bg-white rounded-lg shadow-md mt-10 p-8">
        <h1 class="text-2xl font-bold text-indigo-600 mb-6">Modification</h1>
        <form action="{{ route('update_post', ['post' => $post]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="content" class="block text-indigo-600 mb-3">Contenu:</label>
                <textarea name="content" id="content" class="w-full px-4 py-2 border border-gray-300 rounded resize-none" required>{{ $post->content }}</textarea>
            </div>
            <div class="mb-4">
                {{-- <label for="file" class="block text-indigo-600">File (Optional):</label>
                <input type="file" name="file" id="file" class="w-full border border-gray-300 rounded p-2"> --}}
                <label class="w-58 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Selectionner in fichier</span>
                    <input type='file' name="file" id="file" class="hidden"  />
                </label>
            </div>
            <button type="submit" class="w-full inline-block py-3 bg-indigo-600 text-white rounded-full transition duration-300 hover:bg-indigo-800 focus:outline-none focus:shadow-outline-indigo">Modifier</button>
        </form>
        <a href="{{ route('feed') }}" class="block mt-4 text-indigo-600 hover:text-indigo-800 transition duration-300">Back to Feed</a>
    </div>
</body>

</html>
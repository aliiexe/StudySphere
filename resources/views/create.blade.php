<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Course</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white-100">
    <div class="mt-4">
        <a href="{{ route('display') }}" class="inline-block bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded transition-all duration-300">
            Return
        </a>
    </div>
    

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Create Course</h2>

        @if(session('success'))
            <p class="text-green-600">{{ session('success') }}</p>
        @endif

        <form action="{{ route('store') }}" method="POST" class="bg-white p-6 rounded-md shadow-md">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" name="title" required class="mt-1 p-2 border rounded-md w-full bg-white">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image URL:</label>
                <input type="file" name="image" required class="mt-1 p-2 border rounded-md w-full bg-white">
            </div>

            <div class="mb-4">
                <label for="sub_description" class="block text-sm font-medium text-gray-600">Sub Description:</label>
                <textarea name="sub_description" required class="mt-1 p-2 border rounded-md w-full bg-white"></textarea>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea name="description" required class="mt-1 p-2 border rounded-md w-full bg-white"></textarea>
            </div>

            <div class="mb-4">
                <label for="school" class="block text-sm font-medium text-gray-600">School:</label>
                <input type="text" name="school" required class="mt-1 p-2 border rounded-md w-full bg-white">
            </div>

            <div class="mb-4">
                <label for="field_of_study" class="block text-sm font-medium text-black-600">Field of Study:</label>
                <select name="domaine_id" required class="mt-1 p-2 border rounded-md w-full bg-white text-black">
                    <option value="" disabled selected>Select Field of Study</option>
                    @foreach($fieldsOfStudy as $field)
                        <option value="{{ $field->id }}" style="color: black;">{{ $field->nom }}</option>
                    @endforeach
                </select>
            </div>
            
               
            <div class="mb-4">
                <label for="duree_du_cours" class="block text-sm font-medium text-gray-600">Duration of the Course:</label>
                <input type="text" name="duree_du_cours" required class="mt-1 p-2 border rounded-md w-full bg-white">
            </div>

            <div class="mb-4">
                <label for="pdf_file" class="block text-sm font-medium text-gray-600">PDF File:</label>
                <input type="file" name="pdf_file" required class="mt-1 p-2 border rounded-md w-full bg-white">
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white p-2 rounded-md hover:bg-blue-700">Submit</button>
        </form>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

<div class="container mx-auto p-8">
    <h2 class="text-3xl text-center text-blue-500 mb-8">Course Listing</h2>

    <a href="{{ route('create') }}" class="bg-blue-500 text-white py-2 px-4 rounded inline-block mb-4 hover:bg-blue-700 transition-all duration-300">
        Add a Course
    </a>

    <div class="mb-4">
        <form action="{{ route('courses.filter') }}" method="GET">
            <label for="field_of_study" class="block text-gray-700 mb-2">Filter by Field of Study:</label>
            <select name="field_of_study" id="field_of_study" class="border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-500 transition-all duration-300" onchange="this.form.submit()">
                <option value="" {{ request('field_of_study') === '' ? 'selected' : '' }}>
                    All Fields
                </option>
                @foreach($fieldsOfStudy as $field)
                    <option value="{{ $field->id }}" {{ request('field_of_study') == $field->id ? 'selected' : '' }}>
                        {{ $field->nom }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>
    

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    @if(count($courses) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @foreach($courses as $course)
        <a href="{{ route('show', $course->id) }}" class="hover:no-underline">
            <div class="bg-white border border-gray-300 p-2 rounded-lg transition-transform transform hover:scale-105 course-card"
                 data-field-of-study="{{ strtolower($course->field_of_study) }}">
                 <img src="{{ asset("storage/{$course->image}") }}" alt="{{ $course->title }} Image" class="w-full h-40 object-cover">
                 <p class="text-gray-600 mb-2 whitespace-normal course-school">{{ $course->school }}</p>
                <h3 class="text-lg font-semibold mb-2">{{ $course->title }}</h3>
                <p class="text-gray-600 mb-2 whitespace-normal p-element max-h-16 overflow-hidden">{{ $course->sub_description }}</p>
                        <div class="flex items-center mb-2">
                            <p class="text-gray-600 mr-2">{{ $course->avg_rating }}</p>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#007bff" class="h-4 w-4" viewBox="0 0 24 24">
                                <path d="M12 2l2.4 7.2h7.6l-6 4.8 2.4 7.2-6-4.8-6 4.8 2.4-7.2-6-4.8h7.6z"/>
                            </svg>
                        </div>
                        <div class="flex items-center justify-between">
                            <p class="text-gray-600 mb-2">
                                {{ $course->fieldOfStudy->nom }}
                            </p>
                            <p class="text-gray-600 mb-2">{{ $course->duree_du_cours }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-600">No courses available.</p>
    @endif
</div>

</body>
</html>
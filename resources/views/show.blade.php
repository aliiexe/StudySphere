<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg mt-16">

        <a href="{{ route('display') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all duration-300 mb-6">
            Back to Courses
        </a>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div>
                <img class="w-full rounded mb-4" src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}">
            </div>
            
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ $course->title }} Details</h2>

                <p class="mb-2"><strong>School:</strong> {{ $course->school }}</p>
                <p class="mb-2"><strong>Field of Study:</strong> {{ $course->fieldOfStudy->nom }}</p>
                <p class="mb-2"><strong>Title:</strong> {{ $course->title }}</p>
                <p class="mb-6"><strong>Description:</strong> {{ $course->description }}</p>

                <div class="flex items-center mb-4">
                    <div id="rateYo" class="mr-4"></div>
                    <span id="ratingValue" class="text-lg font-bold">0</span>
                </div>

                <form action="{{ route('download', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Download Course
                    </button>
                    
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            var rateYo = $("#rateYo");
            var rated = false;
            var initialRating = 0;
    
            rateYo.rateYo({
                normalFill: "#A0A0A0",
                rating: initialRating,
                onChange: function (rating, rateYoInstance) {
                    if (!rated) {
                        $("#ratingValue").text(rating);
                    }
                },
                onSet: function (rating, rateYoInstance) {
                    rated = true;
                    rateYoInstance.option("readOnly", true);
    
                    initialRating = rating;
    
                    $.ajax({
                        url: "{{ route('rate', $course->id) }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            rating: rating
                        },
                        success: function (data) {
                            console.log("Rating submitted successfully");
                        },
                        error: function (error) {
                            console.error("Error submitting rating:", error);
                        }
                    });
                }
            });
    
            $('#rateYo').closest('form').on('submit', function (event) {
                event.preventDefault();
            });
        });
    </script>

</body>
</html>




{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-8">

        <a href="{{ route('display') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all duration-300 mb-8">
            Return
        </a>

        <div class="bg-white rounded-lg shadow-lg p-8">

            <h2 class="text-3xl font-bold mb-6">{{ $course->title }} Details</h2>

            <img class="w-full mb-6 rounded" src="{{ asset('images/' . $course->image) }}" alt="{{ $course->title }}">

            <p class="mb-2"><strong>School:</strong> {{ $course->school }}</p>
            <p class="mb-2"><strong>Field of Study:</strong> {{ $course->field_of_study }}</p>
            <p class="mb-2"><strong>Title:</strong> {{ $course->title }}</p>
            <p class="mb-6"><strong>Description:</strong> {{ $course->description }}</p>

            <div class="flex items-center mb-6">
                <div id="rateYo" class="mr-4"></div>
                <span id="ratingValue" class="text-lg font-bold">0</span>
            </div>

            <form action="{{ route('download', $course->id) }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Download Course
                </button>
            </form>
        </div>
    </div>

    <script>
        $(function () {
            var rateYo = $("#rateYo");
            var rated = false;
            var initialRating = 0;
    
            rateYo.rateYo({
                normalFill: "#A0A0A0",
                rating: initialRating,
                onChange: function (rating, rateYoInstance) {
                    if (!rated) {
                        $("#ratingValue").text(rating);
                    }
                },
                onSet: function (rating, rateYoInstance) {
                    rated = true;
                    rateYoInstance.option("readOnly", true);
    
                    initialRating = rating;
    
                    $.ajax({
                        url: "{{ route('rate', $course->id) }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            rating: rating
                        },
                        success: function (data) {
                            console.log("Rating submitted successfully");
                        },
                        error: function (error) {
                            console.error("Error submitting rating:", error);
                        }
                    });
                }
            });
    
            $('#rateYo').closest('form').on('submit', function (event) {
                event.preventDefault();
            });
        });
    </script>

</body>
</html> --}}


{{--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->title }} Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg mt-16">

        <a href="{{ route('display') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-all duration-300 mb-6">
            Back to Courses
        </a>

        <div class="flex flex-col md:flex-row items-center md:items-start mb-8">
            <img class="w-full md:w-1/3 rounded mb-4 md:mb-0" src="{{ asset('images/' . $course->image) }}" alt="{{ $course->title }}">
            
            <div class="md:ml-8 flex flex-col items-start">
                <h2 class="text-4xl font-bold mb-4">{{ $course->title }} Details</h2>

                <p class="mb-2"><strong>School:</strong> {{ $course->school }}</p>
                <p class="mb-2"><strong>Field of Study:</strong> {{ $course->field_of_study }}</p>
                <p class="mb-2"><strong>Title:</strong> {{ $course->title }}</p>
                <p class="mb-6"><strong>Description:</strong> {{ $course->description }}</p>

                <div class="flex items-center mb-4">
                    <div id="rateYo" class="mr-4"></div>
                    <span id="ratingValue" class="text-lg font-bold">0</span>
                </div>

                <form action="{{ route('download', $course->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Download Course
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            var rateYo = $("#rateYo");
            var rated = false;
            var initialRating = 0;
    
            rateYo.rateYo({
                normalFill: "#A0A0A0",
                rating: initialRating,
                onChange: function (rating, rateYoInstance) {
                    if (!rated) {
                        $("#ratingValue").text(rating);
                    }
                },
                onSet: function (rating, rateYoInstance) {
                    rated = true;
                    rateYoInstance.option("readOnly", true);
    
                    initialRating = rating;
    
                    $.ajax({
                        url: "{{ route('rate', $course->id) }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            rating: rating
                        },
                        success: function (data) {
                            console.log("Rating submitted successfully");
                        },
                        error: function (error) {
                            console.error("Error submitting rating:", error);
                        }
                    });
                }
            });
    
            $('#rateYo').closest('form').on('submit', function (event) {
                event.preventDefault();
            });
        });
    </script>

</body>
</html>
 --}}

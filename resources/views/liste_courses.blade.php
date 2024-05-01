{{-- @extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Tous les cours</h1>

        {{-- Loop through all courses and display them --}}
        {{-- @foreach($courses as $course)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text">{{ $course->description }}</p>

                </div>
            </div>
        @endforeach
    </div>
@endsection --}}


@extends('layouts.master')

@section('content')
    <div class="container mt-4">
        <h1>Tous les cours</h1>
        @forelse ($courses as $course)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->title }}</h3>
                    <p class="card-text">{{ $course->description }}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>School:</strong> {{ $course->school }}</li>
                        <li class="list-group-item"><strong>Average Rating:</strong> {{ $course->avg_rating }}</li>
                        <li class="list-group-item"><strong>Domaine:</strong> {{ optional($course->fieldOfStudy)->nom }}</li>
                        <li class="list-group-item"><strong>Durée du cours:</strong> {{ $course->duree_du_cours }}</li>
                    </ul>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-3">Supprimer</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Aucun cours trouvé.</p>
        @endforelse
    </div>
@endsection

@extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mb-4">Liste des Posts</h1>

        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-img-top">
                            @if($post->file_path)
                                <img src="{{ asset($post->file_path) }}" alt="Post Image">
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" alt="Placeholder Image">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->content }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Utilisateur:</strong> {{ optional($post->utilisateur)->username }}</li>
                            <li class="list-group-item"><strong>Likes:</strong> {{ $post->likes }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('posts.destroy', ['id' => $post->id]) }}" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection




{{-- @extends('layouts.master')
@section('content')
    <div class="container-fluid px-4">
        <h1>Liste des Posts</h1>

        <ul>
            @foreach($posts as $post)
                <li>
                    {{ $post->content }}

                </li>
                <li>
                    {{ $post->file_path }}

                </li>
                <li>
                    Utilisateur: {{ ($post->utilisateur)->username }}
                    {{-- Utilisateur: {{ optional($post->utilisateur)->username }} --}}
                {{-- </li>
                <li>
                    {{ $post->likes }}

                </li>

            @endforeach
        </ul>
    </div>
@endsection  --}}

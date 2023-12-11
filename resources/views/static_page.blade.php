<!-- static_page.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Page Statique</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistiques Utilisateurs</h5>
                        <p class="card-text">Nombre total d'utilisateurs : {{ $utilisateurs }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistiques Posts</h5>
                        <p class="card-text">Nombre total de posts : {{ $postsCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

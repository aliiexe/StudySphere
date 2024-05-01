@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Tableau de Bord</h1>

        <div class="row">
            <div class="col-12 mb-3">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Statistiques Utilisateurs</h5>
                        <p class="card-text text-center">Nombre total d'utilisateurs : <strong>{{ $utilisateurs }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-12 mb-3">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-image"></i> Statistiques Posts</h5>
                        <p class="card-text text-center">Nombre total de posts : <strong>{{ $postsCount }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card border-info">
                    <div class="card-body ">
                        <h5 class="card-title "><i class="fas fa-book"></i> Statistiques Cours</h5>
                        <p class="card-text text-center">Nombre total de courses : <strong>{{ $coursCount }}</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
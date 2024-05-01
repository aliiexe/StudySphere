@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="my-4">Liste des Utilisateurs</h1>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Username</th>
                    <th>Date de Naissance</th>
                    <th>Sexe</th>
                    <th>Mobile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($utilisateurs as $utilisateur)
                    <tr>
                        @if($utilisateur->role == 0)
                            <td>{{ $utilisateur->id }}</td>
                            <td>{{ $utilisateur->nom }}</td>
                            <td>{{ $utilisateur->prenom }}</td>
                            <td>{{ $utilisateur->username }}</td>
                            <td>{{ $utilisateur->date_de_naissance }}</td>
                            <td>{{ $utilisateur->genre }}</td>
                            <td>{{ $utilisateur->mobile}}</td>
                            <td>
                                <form action="{{ route('utilisateurs.destroy', ['utilisateur' => $utilisateur->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Aucun utilisateur trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

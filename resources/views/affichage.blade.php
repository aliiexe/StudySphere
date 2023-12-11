<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($utilisateurs as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->date_de_naissance }}</td>
                    <td>{{ $user->username }}</td>
                    <td>
                        <a href="{{ route('profiles.create', ['id' => $user->id]) }}" class="btn btn-warning">Modifier</a>
                        @endforeach
        </tbody>
    </table>
    <center>
<a href="/admin/dashboard">admin</a>
</center>
</body>
</html>

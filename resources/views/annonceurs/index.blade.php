<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Annonceurs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @php
    // Correction : Utilisation de la bonne casse pour le modèle Annonceur
    $annonceurs = \App\Models\Annonceur::all();
@endphp
    <div class="container">
        <h1>Liste des Annonceurs</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Annonceur ID</th>
                    <th scope="col">Utilisateur ID</th>
                    <th scope="col">Société</th>
                    <th scope="col">Adresse société</th>
                    <th scope="col">Téléphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($annonceurs as $annonceur)
                <tr>
                    <!-- Correction : Utilisation de la bonne clé pour l'ID -->
                    <td>{{ $annonceur->annonceur_id }}</td>
                    <td>{{ $annonceur->user_id }}</td>
                    <td>{{ $annonceur->societe }}</td>
                    <td>{{ $annonceur->adresse_societe }}</td>
                    <td>{{ $annonceur->telephone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary"><a href="{{ route('annonceurs.create') }}" style="color: white; text-decoration: none;">Création</a></button>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Utilisateurs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date d'inscription</th>
                    <th scope="col">Type d'utilisateur</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th scope="col">Date de naissance</th>
                    <th scope="col">Ville</th>
                </tr>
            </thead>
            <tbody>
                @php
                $utilisateurs = \App\Models\Utilisateur::all();

                $utilisateurs->each(function ($utilisateur) {
    $utilisateur->setAttribute('nomComplet', $utilisateur->nom . ' ' . $utilisateur->prenom);
    $utilisateur->setAttribute('date_inscription', \Carbon\Carbon::parse($utilisateur->date_inscription)); // Convertir en objet DateTime
});


                $utilisateurs = $utilisateurs->sortBy('nomComplet');
                @endphp
                @foreach ($utilisateurs as $utilisateur)
                <tr>
                    <td>{{ $utilisateur->user_id }}</td>
                    <td>{{ $utilisateur->nom }}</td>
                    <td>{{ $utilisateur->prenom }}</td>
                    <td>{{ $utilisateur->email }}</td>
                    <td>{{ $utilisateur->date_inscription->format('d/m/Y') }}</td>
                    <td>{{ $utilisateur->type_utilisateur }}</td>
                    <td>{{ $utilisateur->adresse }}</td>
                    <td>{{ $utilisateur->numero_telephone }}</td>
                    <td>{{ $utilisateur->date_naissance }}</td>
                    <td>
                        @if ($utilisateur->ville)
                            {{ $utilisateur->ville->nom }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-primary"><a href="{{ route('utilisateurs.create') }}" style="color: white; text-decoration: none;">Création</a></button>
    </div>
</body>
</html>

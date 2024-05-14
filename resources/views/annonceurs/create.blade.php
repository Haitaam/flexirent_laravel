<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Création d'un nouvel annonceur</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    @php
    $utilisateurs = \App\Models\Utilisateur::all();

    $utilisateurs->each(function ($utilisateur) {
$utilisateur->setAttribute('nomComplet', $utilisateur->nom . ' ' . $utilisateur->prenom);
$utilisateur->setAttribute('date_inscription', \Carbon\Carbon::parse($utilisateur->date_inscription)); // Convertir en objet DateTime
});


    $utilisateurs = $utilisateurs->sortBy('nomComplet');
    @endphp
    <form method="POST" action="{{ route('annonceurs.store') }}" class="container">
        @csrf

        <div class="form-group">
            <label for="user_id">Utilisateur ID</label>
            <select name="user_id" class="form-control">
                @foreach ($utilisateurs as $utilisateur)
                <option value="{{ $utilisateur->user_id }}">{{ $utilisateur->nomComplet }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="societe">Société</label>
            <input type="text" name="societe" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse_societe">Adresse société</label>
            <input type="text" name="adresse_societe" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="number" name="telephone" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Créer" class="btn btn-primary">
        </div>
    </form>

    @php
    $utilisateurs = \App\Models\Utilisateur::all();
    @endphp
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Créer un nouvel utilisateur</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    {{-- On récupère la liste de toutes les villes de la base de données. --}}
    @php
        $villes = \App\Models\Ville::select('ville_id', 'nom')->get();
    @endphp

    {{-- On ajoute une propriété à chaque ville qui contient le nom complet de la ville, c'est à dire le nom de la ville suivit du numéro de la ville --}}
    @php
        $villes->each(function ($ville) {
            $ville->setAttribute('villeComplet', $ville->nom . ' (' . $ville->ville_id . ')' );
        });
    @endphp

    {{-- On trie la liste de ville par le nom complet --}}
    @php
        $villes = $villes->sortBy('villeComplet');
    @endphp

    <div class="container mx-auto py-12 md:py-24 max-w-xl">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-gray-900">Créer un nouvel utilisateur</h1>
            <p class="mt-4 text-gray-600">
                Remplissez le formulaire ci-dessous pour ajouter un nouvel utilisateur.
            </p>
            <form method="POST" action="{{ route('utilisateurs.store') }}" class="mt-8 space-y-6">
                @csrf

                {{-- On ajoute un champ pour le nom --}}
                <div>
                    <label for="nom" class="text-sm font-medium text-gray-900 block mb-2">Nom:</label>
                    <input type="text" class="border px-4 py-2 w-full rounded" id="nom" name="nom" placeholder="Entrez le nom" required>
                </div>

                {{-- On ajoute un champ pour le prénom --}}
                <div>
                    <label for="prenom" class="text-sm font-medium text-gray-900 block mb-2">Prénom:</label>
                    <input type="text" class="border px-4 py-2 w-full rounded" id="prenom" name="prenom" placeholder="Entrez le prénom" required>
                </div>

                {{-- On ajoute un champ pour l'email --}}
                <div>
                    <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email:</label>
                    <input type="email" class="border px-4 py-2 w-full rounded" id="email" name="email" placeholder="Entrez l'email" required>
                </div>

                {{-- On ajoute un champ pour le mot de passe --}}
                <div>
                    <label for="mot_de_passe" class="text-sm font-medium text-gray-900 block mb-2">Mot de passe:</label>
                    <input type="password" class="border px-4 py-2 w-full rounded" id="mot_de_passe" name="mot_de_passe" placeholder="Entrez le mot de passe" required>
                </div>

                {{-- On ajoute un champ pour le type d'utilisateur --}}<div>
    <label for="type_utilisateur" class="text-sm font-medium text-gray-900 block mb-2">Type d'utilisateur:</label>
    <select class="border px-4 py-2 w-full rounded" id="type_utilisateur" name="type_utilisateur" required>
        <option value="" disabled selected>Sélectionnez un type d'utilisateur</option>
        <option value="Annonceur">Annonceur</option>
        <option value="Locataire">Locataire</option> <!-- Changez la valeur ici -->
    </select>
</div>


                {{-- On ajoute un champ pour l'adresse --}}
                <div>
                    <label for="adresse" class="text-sm font-medium text-gray-900 block mb-2">Adresse:</label>
                    <input type="text" class="border px-4 py-2 w-full rounded" id="adresse" name="adresse" placeholder="Entrez l'adresse" required>
                </div>

                {{-- On ajoute un champ pour le numéro de téléphone --}}
                <div>
                    <label for="numero_telephone" class="text-sm font-medium text-gray-900 block mb-2">Numéro de téléphone:</label>
                    <input type="text" class="border px-4 py-2 w-full rounded" id="numero_telephone" name="numero_telephone" placeholder="Entrez le numéro de téléphone" required>
                </div>

                {{-- On ajoute un champ pour la date de naissance --}}
                <div>
                    <label for="date_de_naissance" class="text-sm font-medium text-gray-900 block mb-2">Date de naissance:</label>
                    <input type="date" class="border px-4 py-2 w-full rounded" id="date_naissance" name="date_naissance" required>
                </div>

                {{-- On ajoute un champ pour la ville --}}
                <div>
                    <label for="ville_id" class="text-sm font-medium text-gray-900 block mb-2">Villes:</label>
                    <select class="border px-4 py-2 w-full rounded" id="ville_id" name="ville_id" required>
                        <option value="" disabled selected>Sélectionnez une ville</option>

                        {{-- On parcourt la liste des villes et on ajoute un option pour chaque ville --}}
                        @foreach ($villes as $ville)
                            <option value="{{ $ville->ville_id }}"{{ old('villes_id') == $ville->ville_id ? ' selected' : '' }}>
                                {{ $ville->villeComplet }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- On ajoute un bouton pour envoyer le formulaire --}}
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer</button>

            </form>
        </div>
    </div>
</body>
</html>


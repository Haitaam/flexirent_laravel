@php
$biens = \App\Models\Bien::All();
$annonces = \App\Models\Annonces::All();
$annonceur= \App\Models\annonceur::All();
 $villes = \App\Models\Ville::select('ville_id', 'nom')->get();
 $villes= \App\Models\ville::All();
    @endphp
    <section class="w-full py-12 md:py-24 lg:py-32 justify-center">
    <h2 class="text-3xl md:text-4xl font-bold text-center text-black mb-4">Nos entreprises partenaires</h2>
    <div class="container grid grid-cols-1 gap-6 px-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 md:px-6 ">
        <!-- Boucle sur chaque annonceur pour afficher les informations -->
        @foreach($annonceur as $annonceur)
        <a href="{{ route('societe.show', ['id' => $annonceur->annonceur_id]) }}" class="card-link hover:text-red-950 hover:font-semibold">
            <div class="rounded-lg border bg-white p-6 shadow-sm dark:border-gray-800 dark:bg-gray-950">
                <div class="flex items-center gap-4">
                    <!-- Affichage de la photo de l'annonceur -->
                    <img
                        src="{{ asset('societe/' . $annonceur->photo) }}"
                        width="80"
                        height="80"
                        alt="Company Logo"
                        class="h-20 w-20 rounded-md object-cover"
                        style="aspect-ratio: 80 / 80; object-fit: cover;"
                    />
                    <div class="space-y-1">
                        <!-- Affichage du nom de la société -->
                        <h3 class="text-lg font-semibold">{{ $annonceur->societe }}</h3>
                        <!-- Affichage de l'adresse de la société -->
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $annonceur->adresse_societe }} - {{ $annonceur->ville->nom }}
                        </p>
                    </div>
                </div>
                <div class="mt-4 space-y-2">
                    <!-- Affichage du numéro de téléphone -->
                    <p class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="h-4 w-4"
                        >
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        {{ $annonceur->telephone }}
                    </p>
                    <!-- Affichage de la date de création et de mise à jour -->
                    <p class="text-sm text-gray-500 dark:text-gray-400">Created at: {{ $annonceur->created_at }}</p>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</section>

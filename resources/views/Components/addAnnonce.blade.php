@php
    $villes = \App\Models\Ville::select('ville_id', 'nom')->get();
@endphp

@if ($utilisateur->type_utilisateur == 'Annonceur')
<section class="bg-gray-100 py-12 md:py-16">
    <div class="container mx-auto px-4 md:px-6">
      <h2 class="text-2xl md:text-3xl font-bold mb-6">Créer une annonce</h2>
      <form class="grid grid-cols-1 md:grid-cols-2 gap-6" action="{{ route('annonces.store') }}" method="POST">
        @csrf
        <div class="space-y-4">
          <div>
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="type_bien"
            >
              Type du bien
            </label>
            <div class="flex space-x-2">
              <select
                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                id="type_bien"
                name="type_bien"
              >
                <option value="" disabled>Choisir un type</option>
                <option value="Appartement">Appartement</option>
                <option value="Maison">Maison</option>
                <option value="Terrain">Terrain</option>
                <option value="Local commercial">Local commercial</option>
                <option value="Matériel">Matériel</option>
                <option value="Autre">Autre</option>
              </select>
            </div>
          </div>

          <div>
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="description"
            >
              Description
            </label>
            <textarea
              class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="description"
              name="description"
              placeholder="Décrivez votre annonce"
              rows="4"
            ></textarea>
          </div>

        </div>
        <div class="space-y-4">
          <div>
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="price"
            >
              Prix par nuit
            </label>
            <input
              class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="price"
              name="price"
              placeholder="Prix par nuit"
              type="number"
            />
          </div>
          <div>
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="availability"
            >
              Disponibilité
            </label>
            <input
              class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="availability"
              name="availability"
              type="date"
            />
          </div>
          <div>
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="photo"
            >
              Photo
            </label>
            <input
              class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="photo"
              name="photo"
              type="file"
            />
          </div>
          <div>
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="ville"
            >
              Ville
            </label>
            <select
              class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm text-black ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="ville"
              name="ville"
            >
              <option value="" disabled{{ old('villes_id') ? '' : ' selected' }}>
                Sélectionner une ville
              </option>
              @foreach ($villes as $ville)
                <option value="{{ $ville->ville_id }}"{{ old('villes_id') == $ville->ville_id ? ' selected' : '' }}>
                  {{ $ville->nom }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
      </form>
      <div class="mt-8 flex justify-end">
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-slate-400">
          Publier l'annonce
        </button>
      </div>
    </div>
  </section>
@endif

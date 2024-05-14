@php
$biens = \App\Models\Bien::All();
$annonces = \App\Models\Annonces::All();
$annonceur= \App\Models\annonceur::All();
 $villes = \App\Models\Ville::select('ville_id', 'nom')->get();
 $villes= \App\Models\ville::All();
    @endphp

@foreach($societe->annonces as $annonce)
@foreach($societe->biens as $bien)

<section class="w-full max-w-6xl mx-auto p-6 md:p-8 lg:p-10 grid gap-6 md:gap-8 lg:gap-10">
<div class="grid md:grid-cols-2 gap-6 md:gap-8 lg:gap-10 items-center">
  <img
    src="{{ asset('annoncephoto/' . $annonce->photo) }}"

    width="600"
    height="400"
    class="rounded-lg w-full aspect-[3/2] object-cover"
  />
  <div class="grid gap-4">
    <div>
      <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold">{{$annonce->titre}}</h1>
      <p class="text-gray-500 dark:text-gray-400">{{$annonce->description}}</p>
    </div>
    <div class="grid sm:grid-cols-2 gap-4">
      <div class="grid gap-1">
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Localisation</span>
        <div class="flex items-center gap-2">
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
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
          >
            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
            <circle cx="12" cy="10" r="3"></circle>
          </svg>
          <span>{{$bien->ville->nom}}</span>
        </div>
      </div>
      <div class="grid gap-1">
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Prix par nuit</span>
        <div class="flex items-center gap-2">
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
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
          >
            <line x1="12" x2="12" y1="2" y2="22"></line>
            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
          </svg>
          <span>{{$annonce->prix_par_nuit}} MAD</span>
        </div>
      </div>
      <div class="grid gap-1">
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Disponibilité</span>
        <div class="flex items-center gap-2">
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
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
          >
            <path d="M8 2v4"></path>
            <path d="M16 2v4"></path>
            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
            <path d="M3 10h18"></path>
          </svg>
          <span>{{$annonce->disponibilite}}</span>
        </div>
      </div>
      <div class="grid gap-1">
        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">Date publication</span>
        <div class="flex items-center gap-2">
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
            class="w-5 h-5 text-gray-500 dark:text-gray-400"
          >
            <path d="M8 2v4"></path>
            <path d="M16 2v4"></path>
            <rect width="18" height="18" x="3" y="4" rx="2"></rect>
            <path d="M3 10h18"></path>
            <path d="m9 16 2 2 4-4"></path>
          </svg>
          <span>{{$annonce->date_publication}}</span>
        </div>
      </div>
    </div>
    <div class="grid sm:grid-cols-2 gap-4">
      <div class="flex items-center gap-2">
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
          class="w-5 h-5 text-gray-500 dark:text-gray-400"
        >
          <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
        </svg>
        <span>{{$annonce->likes}} likes</span>
      </div>
      <div class="flex items-center gap-2">
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
          class="w-5 h-5 text-gray-500 dark:text-gray-400"
        >
          <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"></path>
        </svg>
        <span>{{ $annonce->commentaires->count() }} commentaires</span>
      </div>
    </div>
 <a href="{{ route('utilisateurs.create') }}"><button class="inline-flex items-center justify-center whitespace-nowrap text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 font-semibold text-slate-50 hover:bg-slate-500 bg-black h-11 rounded-md px-8 w-full">
    Reserve
  </button></a>
  </div>
</div>

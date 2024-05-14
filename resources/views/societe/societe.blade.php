<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FlexiRent-{{$societe->societe}}</title>
  <link rel="shortcut icon" href="{{ asset('societe/' . $societe->photo) }}" type="image/x-icon ">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="css/welcome.css">
</head>
<body>


<div>

    <header class="flex h-16 items-center justify-between px-4 md:px-6 pt-3">
      <a class="flex items-center gap-2" href="#">
       <img src="{{ asset('societe/' . $societe->photo) }}" alt=""
       height="40px"
       width="40px"

       >
        <span class="text-lg font-semibold">{{$societe->societe}}</span>
      </a>
      <a href="{{ route('welcome') }}">
        <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-slate-500 hover:text-accent-foreground h-10 w-10 rounded-full">
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
            class="h-5 w-5"
          >
            <path d="m12 19-7-7 7-7"></path>
            <path d="M19 12H5"></path>
          </svg>
          <span class="sr-only" >Retour à l'accueil</span>
        </button>
      </a>
    </header></div>



    @foreach($societe->annonces as $annonce)
    @foreach($societe->biens as $bien)
    <div class="flex justify-center items-center pt-11 pb-11">
        <h1 class="text-3xl font-bold">Les annonces de la Société</h1>
      </div>

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

        <!-- Si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion ou d'inscription -->
        <a href="{{ route('login') }}">
          <button class="inline-flex items-center justify-center whitespace-nowrap text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 font-semibold text-slate-50 hover:bg-slate-500 bg-black h-11 rounded-md px-8 w-full">
            Réserve
          </button>
        </a>
        @if(!Auth::check())
        @else
        <!-- Si l'utilisateur est connecté, il peut réserver normalement -->
        <!-- Ajoutez ici le lien vers la page de réservation -->
        <a href="{{ route('reservations.create') }}">
          <button class="inline-flex items-center justify-center whitespace-nowrap text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 font-semibold text-slate-50 hover:bg-slate-500 bg-black h-11 rounded-md px-8 w-full">
            Réserve
          </button>
        </a>
      @endif

      </div>
    </div>
    <!--
// v0 by Vercel.
// https://v0.dev/t/dooWOxVDFPo
-->

<div class="grid gap-6">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl">Commentaires</h2>
      <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 rounded-md px-3 show-comments-btn">
        Afficher les commentaires
      </button>
    </div>


    <div class="grid gap-6 comment-section hidden">
        @foreach($annonce->commentaires as $commentaire)
            <?php
            // Récupérer l'utilisateur correspondant à partir de l'ID utilisateur du commentaire
            $utilisateur = \App\Models\Utilisateur::find($commentaire->utilisateur_id);
            ?>
            <!-- Affichage des détails du commentaire -->
            <div class="flex items-start gap-4">
                <div class="grid gap-2 flex-1">
                    <div class="flex items-center justify-between">
                        <div class="font-semibold">{{ $utilisateur->nom }} {{ $utilisateur->prenom }}</div>
                    </div>
                    <div>
                        {{ $commentaire->commentaire }}
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <div class="flex items-start gap-4">

      <div class="grid gap-2 flex-1">
        <textarea
          class="flex min-h-[80px] w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 resize-none"
          placeholder="Écrivez votre commentaire..."
        ></textarea>
        <div class="flex items-center justify-end gap-2">
         <a href="{{ route('utilisateurs.create') }}">
            <button  class="inline-flex items-center justify-center whitespace-nowrap text-sm ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 font-semibold text-slate-50 hover:bg-slate-500 bg-black h-9 rounded-md px-3">
                Publier
              </button>
         </a>
        </div>
      </div>
    </div>
  </div>
  </section>
    @endforeach
    @endforeach

    <script>// Sélectionnez le bouton pour afficher les commentaires
        const showCommentsBtns = document.querySelectorAll('.show-comments-btn');

        // Ajoutez un gestionnaire d'événements à chaque bouton
        showCommentsBtns.forEach(btn => {
          btn.addEventListener('click', () => {
            // Sélectionnez la section des commentaires correspondante
            const commentSection = btn.closest('.grid').querySelector('.comment-section');
            // Afficher ou masquer la section des commentaires en fonction de son état actuel
            commentSection.classList.toggle('hidden');
            if (commentSection.classList.contains('hidden')) {
      btn.textContent = 'Afficher les commentaires';
    } else {
      btn.textContent = 'Masquer les commentaires';
    }
          });
        });
        </script>
 <!-- Tes scripts JavaScript -->


  <!-- Inclus jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Inclus Bootstrap Bundle de Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

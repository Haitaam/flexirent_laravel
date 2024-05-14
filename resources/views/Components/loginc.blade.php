<form method="POST" action="{{ route('login.submit') }}">
    @csrf
    <main class="flex h-screen w-full items-center justify-center bg-gray-100 px-4 dark:bg-white">
      <div class="rounded-lg border bg-card text-card-foreground shadow-sm w-full max-w-md" data-v0-t="card">
        <div class="flex flex-col p-6 space-y-1">
          <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Connexion</h3>
          <p class="text-sm text-muted-foreground">Entrez votre adresse email et votre mot de passe pour accéder à votre compte.</p>
        </div>
        <div class="p-6 space-y-4">
          <div class="space-y-2">
            <label
              class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
              for="email"
            >
              Adresse email
            </label>
            <input
              class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="email"
              name="email"
              placeholder="m@exemple.com"
              required=""
              type="email"
            />
          </div>
          <div class="space-y-2">
            <div class="flex items-center justify-between">
              <label
                class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                for="password"
              >
                Mot de passe
              </label>
              <a class="text-sm underline" href="">
                Mot de passe oublié ?
              </a>
            </div>
            <input
              class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
              id="mot_de_passe"
              name="mot_de_passe"
              required=""
              type="password"
            />
          </div>
        </div>
        <div class="flex items-center p-6">
          <button
            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-white bg-black hover:bg-slate-600  h-10 px-4 py-2 w-full"
            type="submit"
          >
            Se connecter
            <span class="ml-2">  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0
0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
</svg></span>
          </button>
        </div>
      </div>
    </main>
  </form>



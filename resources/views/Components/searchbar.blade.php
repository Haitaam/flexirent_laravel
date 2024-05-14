@php
$villes= \App\Models\ville::All();
@endphp
<form id="search-form" method="GET" action="{{ route('search') }}">
    <div class="flex justify-center items-center">
        <div class="w-full max-w-md">
            <h1 class=" py-4 text-3xl md:text-4xl font-extrabold tracking-tight text-black whitespace-nowrap justify-center text-center">Trouver votre idéal bien <br> ou societé</h1>
            <div class="flex items-center border-2 border-gray-300 rounded-full px-4 py-2">
                <input id="search-input" placeholder="Rechercher..." class="flex-1 outline-none" type="text" name="search" />
                <button class="bg-gray-900 text-white rounded-full px-4 py-2 hover:bg-gray-600 hover:text-black transition-colors">Rechercher</button>
            </div>
        </div>
    </div>
</form>

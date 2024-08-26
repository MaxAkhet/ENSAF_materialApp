<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Modification') }} :
                {{$materiel->Num_ordre}} --->
                {{$materiel->Designation}}
            </h2>
            {{-- <x-button target="_blank" href="https://github.com/kamona-wd/kui-laravel-breeze" variant="black"
                class="items-center max-w-xs gap-2">
                <x-icons.github class="w-6 h-6" aria-hidden="true" />
                <span>Star on Github</span>
            </x-button> --}}
        </div>
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    {{-- <p class="py-4 text-gray-600 dark:text-gray-400">Useless Pages to demo sidebar.</p>

    <div class="py-6">
        @php
        $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'black'];

        $sizes = ['sm', 'base', 'lg'];
        @endphp

        <div class="grid items-center gap-4">
            @foreach ($variants as $variant)
            <div class="grid items-start grid-cols-3 gap-4 justify-items-center">
                @foreach ($sizes as $size)
                <x-button iconOnly :variant="$variant" :size="$size" :srText="$variant">
                    <x-heroicon-o-home
                        class="{{ $size == 'sm' ? 'w-4 h-4' : ($size == 'base' ? 'w-6 h-6' : 'w-7 h-7' ) }}" />
                </x-button>
                @endforeach
            </div>
            @endforeach
        </div>
    </div> --}}

    <div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
        <form action="{{ route('materiels.update', $materiel->Num_ordre) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Département -->
            <div class="mb-4">
                <x-label for="departement" :value="__('Département')" />
                <select id="departement" name="departement" class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                    <option value="GI" {{ $materiel->departement == 'GI' ? 'selected' : '' }}>GI</option>
                    <option value="GEI" {{ $materiel->departement == 'GEI' ? 'selected' : '' }}>GEI</option>
                </select>
            </div>
            
            <!-- Catégorie -->
            <div class="mb-4">
                <x-label for="categorie" :value="__('Catégorie')" />
                <select id="categorie" name="categorie" class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1 dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                    <option value="Mesure electrique" {{ $materiel->categorie == 'Mesure electrique' ? 'selected' : '' }}>Mesure électrique</option>
                    <option value="Alimentations et generateur" {{ $materiel->categorie == 'Alimentations et generateur' ? 'selected' : '' }}>Alimentations et générateur</option>
                    <option value="Telecommunication" {{ $materiel->categorie == 'Telecommunication' ? 'selected' : '' }}>Télécommunication</option>
                    <option value="Connectiques et Outillages" {{ $materiel->categorie == 'Connectiques et Outillages' ? 'selected' : '' }}>Connectiques et outillages</option>
                </select>
            </div>
            
            <!-- Désignation -->
            <div class="mb-4">
                <x-label for="designation" :value="__('Désignation')" />
                <x-input id="designation" class="block mt-1 w-full" type="text" name="designation" value="{{ $materiel->designation }}" required />
            </div>
            
            <!-- Fournisseur -->
            <div class="mb-4">
                <x-label for="fournisseur" :value="__('Fournisseur')" />
                <x-input id="fournisseur" class="block mt-1 w-full" type="text" name="fournisseur" value="{{ $materiel->fournisseur }}" required />
            </div>
            
            <!-- Prix HT -->
            <div class="mb-4">
                <x-label for="prix_ht" :value="__('Prix HT (DH)')" />
                <x-input id="prix_ht" class="block mt-1 w-full" type="number" name="prix_ht" value="{{ $materiel->prix_ht }}" step="0.01" required />
            </div>
            
            <!-- Date d'Acquisition -->
            <div class="mb-4">
                <x-label for="date_acquisition" :value="__('Date d\'Acquisition')" />
                <x-input id="date_acquisition" class="block mt-1 w-full" type="date" name="date_acquisition" value="{{ $materiel->date_acquisition }}" required />
            </div>
            
            <!-- Bouton Ajouter -->
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Enregistrer les modifications') }}
                </x-button>
            </div>
        </form>
        
    </div>

</x-app-layout>
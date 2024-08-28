<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Enregistrement de Depense') }}
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


    {{-- <p class="py-4 text-gray-600 dark:text-gray-400">Useless Pages to demo sidebar.</p> --}}

    {{-- <div class="py-6">
        @php
        $variants = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'black'];

        $sizes = ['sm', 'base', 'lg'];
        @endphp


        <div class="grid items-center gap-4">
            @foreach ($variants as $variant)
            <div class="grid items-start grid-cols-3 gap-4 justify-items-center">
                @foreach ($sizes as $size)
                <x-button :variant="$variant" size="{{ $size }}">Button</x-button>
                @endforeach
            </div>
            @endforeach
        </div>
    </div> --}}

    {{-- @section('content') --}}
    <div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
        <form action="{{ route('depenses.store') }}" method="POST">
            @csrf
    
            <!-- Sélection du Matériel -->
            <div class="mb-4">
                <x-label for="materiel_id" :value="__('Matériel')" />
                <select id="materiel_id" name="materiel_id" class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                    @foreach ($materiels as $materiel)
                        <option value="{{ $materiel->Num_ordre }}">{{ $materiel->Designation }}</option>
                    @endforeach
                </select>
            </div>
    
            <!-- Description de la Dépense -->
            <div class="mb-4">
                <x-label for="description" :value="__('Description')" />
                <x-input id="description" class="block mt-1 w-full" type="text" name="description" required />
            </div>
    
            <!-- Montant de la Dépense -->
            <div class="mb-4">
                <x-label for="amount" :value="__('Montant (DH)')" />
                <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" step="0.01" required />
            </div>
    
            <!-- Date de la Dépense -->
            <div class="mb-4">
                <x-label for="date" :value="__('Date de la Dépense')" />
                <x-input id="date" class="block mt-1 w-full" type="date" name="date" required />
            </div>
    
            <!-- Bouton Ajouter -->
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Ajouter Dépense') }}
                </x-button>
            </div>
        </form>
    </div>
    
    
{{-- @endsection --}}

</x-app-layout>
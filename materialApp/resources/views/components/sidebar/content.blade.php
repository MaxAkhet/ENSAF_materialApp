<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    {{-- <x-sidebar.dropdown title="Buttons" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Text button" href="{{ route('buttons.text') }}"
            :active="request()->routeIs('buttons.text')" />
        <x-sidebar.sublink title="Icon button" href="{{ route('buttons.icon') }}"
            :active="request()->routeIs('buttons.icon')" />
        <x-sidebar.sublink title="Text with icon" href="{{ route('buttons.text-icon') }}"
            :active="request()->routeIs('buttons.text-icon')" />
    </x-sidebar.dropdown> --}}

    {{-- <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Dummy Links</div> --}}

    {{-- @php
        $links = array_fill(0, 20, '');
    @endphp

    @foreach ($links as $index => $link)
        <x-sidebar.link title="Dummy link {{ $index + 1 }}" href="#" />
    @endforeach --}}
    
    <x-sidebar.dropdown title="Gestion" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Ajout de materiel" href="{{ route('materiels.ajouter') }}"
            :active="request()->routeIs('materiels.ajouter')" />
        <x-sidebar.sublink title="Modification de materiel" href="{{ route('materiels.select')  }}"
            :active="request()->routeIs('materiels.edit' )" />
        <x-sidebar.sublink title="Supression de materiel" href="{{ route('materiels.delselect') }}"
            :active="request()->routeIs('materiels.delselect')" />
    </x-sidebar.dropdown>



    {{-- RECHERCHE --}}

    <x-sidebar.dropdown title="Rechercher" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Par Date" href="{{ route('materiels.datesearchAjax')}}"
            :active="request()->routeIs('materiels.datesearchAjax')" />
        <x-sidebar.sublink title="Par designation" href="{{ route('materiels.designsearchAjax')}}"
            :active="request()->routeIs('materiels.designsearchAjax')" />
        <x-sidebar.sublink title="Par categorie" href="{{ route('materiels.categorysearchAjax')}}"
            :active="request()->routeIs('materiels.categorysearchAjax')" />
    </x-sidebar.dropdown> 


        {{-- STATISTIQUES --}}

    <x-sidebar.dropdown title="Statistiques" :active="Str::startsWith(request()->route()->uri(), 'buttons')">
        <x-slot name="icon">
            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Cout par Annee" href="#"
            :active="request()->routeIs('#')" />
        <x-sidebar.sublink title="Cout par Categorie" href="#"
            :active="request()->routeIs('#')" />
        
    </x-sidebar.dropdown>
       
</x-perfect-scrollbar>
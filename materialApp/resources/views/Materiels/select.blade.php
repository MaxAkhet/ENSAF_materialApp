<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sélectionnez un matériel à modifier') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
        <form id="edit-form" action="{{ route('materiels.select') }}" method="GET" onsubmit="updateActionURL()">
            @csrf

            <!-- Département -->
            <div class="mb-4">
                <x-label for="num_ordre" :value="__('Numero d\'ordre')" />
                <select id="num_ordre" name="num_ordre" class="py-2 border-gray-400 rounded-md focus:border-gray-400 focus:ring
                    focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-white dark:border-gray-600 dark:bg-dark-eval-1
                    dark:text-gray-300 dark:focus:ring-offset-dark-eval-1">
                    @foreach($materiels as $materiel)
                    <option value="{{ $materiel->Num_ordre }}">{{$materiel->Num_ordre}}--->{{ $materiel->Designation }}</option>
                    @endforeach
                </select>

                <div class="mt-4">
                    <x-button>
                        {{ __('Modifier') }}
                    </x-button>
                </div>
            </div>
        </form>

        <script>
            function updateActionURL() {
                var numOrdre = document.getElementById('num_ordre').value;
                var form = document.getElementById('edit-form');
                form.action = "{{ url('materiels') }}/" + numOrdre + "/edit";
            }
        </script>

        </div>
</x-app-layout>



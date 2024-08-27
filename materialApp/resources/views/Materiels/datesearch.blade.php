<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Recherche de Matériel par Date') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
        <!-- Barre de recherche par date -->
        <x-label for="date_search" :value="__('Saisissez la Date')" />
        <x-input type="date" id="date_search" class="py-2 border-gray-400 rounded-md w-full" placeholder="Sélectionnez une date..."/>

        <!-- Résultats de la recherche -->
        <div id="resultats" class="mt-4"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#date_search').on('change', function() {
                var date = $(this).val();

                $.ajax({
                    url: "{{ route('materiels.responsedatesearchAjax') }}",
                    type: "GET",
                    data: {'date': date},
                    success: function(data) {
                        $('#resultats').html('');

                        if(data.length === 0) {
                            $('#resultats').append('<p class="text-gray-600">Aucun matériel trouvé pour cette date.</p>');
                        } else {
                            let i = 1;
                            data.forEach(function(materiel, i) {
                                $('#resultats').append(
                                    '<div class="border-b border-gray-400 py-2">' +
                                        '<h2 class="text-center bg-indigo-500 text-white py-2">Resultat ' + (i + 1) + '</h2>' +
                                        '<p><strong>Numéro d\'Ordre:</strong> ' + materiel.Num_ordre + '</p>' +
                                        '<p><strong>Désignation:</strong> ' + materiel.Designation + '</p>' +
                                        '<p><strong>Département:</strong> ' + materiel.Departement + '</p>' +
                                        '<p><strong>Catégorie:</strong> ' + materiel.Categorie + '</p>' +
                                        '<p><strong>Fournisseur:</strong> ' + materiel.Fournisseur + '</p>' +
                                        '<p><strong>Prix HT:</strong> ' + materiel.Prix_HT + ' DH</p>' +
                                        '<p><strong>Date d\'Acquisition:</strong> ' + materiel.Date_Acquisition + '</p>' +
                                    '</div>'
                                );
                            });
                                                    }
                    }
                });
            });
        });
    </script>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-300 leading-tight">
            {{ __('Recherche de Matériel par Désignation') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
        <!-- Barre de recherche par désignation -->
        <x-label for="designation_search" :value="__('Saisissez la Désignation')" />
        <x-input type="text" id="designation_search" class="py-2 border-gray-400 rounded-md w-full" placeholder="Entrez une désignation..."/>

        <!-- Résultats de la recherche -->
        <div id="resultats" class="mt-4"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#designation_search').on('input', function() {
                var designation = $(this).val().trim();
    
                // Si le champ de recherche est vide, on efface les résultats et on arrête le script
                if (designation === '') {
                    $('#resultats').html(''); // Effacer les résultats précédents
                    return; // Arrêter le script ici
                }
    
                $.ajax({
                    url: "{{ route('materiels.responsedesignsearchAjax') }}",
                    type: "GET",
                    data: {'designation': designation},
                    success: function(data) {
                        $('#resultats').html(''); // Effacer les résultats précédents
    
                        if(data.length === 0) {
                            $('#resultats').append('<p class="text-gray-600">Aucun matériel trouvé pour cette désignation.</p>');
                        } else {
                            data.forEach(function(materiel, index) {
                                $('#resultats').append(
                                    '<div class="border-b border-gray-400 py-2">' +
                                        '<h2 class="text-center bg-indigo-500 text-white py-2">Résultat ' + (index + 1) + '</h2>' +
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

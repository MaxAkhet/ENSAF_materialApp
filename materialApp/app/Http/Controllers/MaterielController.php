<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    // Affiche le formulaire de création
    public function create()
    {
        return view('Materiels.ajouter');
    }

    // Traite les données du formulaire
    public function store(Request $request)
    {
        // Valider les données
        $validatedData = $request->validate([
            'departement' => 'required|string|max:255',
            'categorie' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'fournisseur' => 'required|string|max:255',
            'prix_ht' => 'required|numeric',
            'date_acquisition' => 'required|date',
        ]);

        // Créer un nouveau matériel
        Materiel::create($validatedData);

        // Rediriger ou afficher un message de succès
        return redirect()->route('materiels.ajouter')->with('success', 'Matériel ajouté avec succès.');
    }
}

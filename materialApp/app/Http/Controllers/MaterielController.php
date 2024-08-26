<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    public function destroy($num_ordre)
    {
        $materiel = Materiel::where('Num_ordre', $num_ordre)->firstOrFail();
        $materiel->delete();

        return redirect()->route('materiels.delselect')->with('success', 'Matériel supprimé avec succès.');
    }

    public function delselect()
    {
        $materiels = Materiel::all();
        //dd($materiels); // Cette ligne arrête l'exécution et affiche le contenu de $materiels
        return view('Materiels.delselect', compact('materiels'));
    }


    public function update(Request $request, $num_ordre)
    {
        $materiel = Materiel::where('Num_ordre', $num_ordre)->firstOrFail();

        // Validation des données (facultatif mais recommandé)
        $request->validate([
            'departement' => 'required|string',
            'categorie' => 'required|string',
            'designation' => 'required|string',
            'fournisseur' => 'required|string',
            'prix_ht' => 'required|numeric',
            'date_acquisition' => 'required|date',
        ]);

        // Mettre à jour le matériel avec les données du formulaire
        $materiel->update($request->only(['departement', 'categorie', 'designation', 'fournisseur', 'prix_ht', 'date_acquisition']));
        //dd($materiel);
        return redirect()->route('materiels.select')->with('success', 'Matériel mis à jour avec succès. Autre modification ?');
    }


    //selection d'un materiel
    public function select()
    {
        $materiels = Materiel::all();
        //dd($materiels); // Cette ligne arrête l'exécution et affiche le contenu de $materiels
        return view('Materiels.select', compact('materiels'));
    }
    //reedition d'un materiel
    public function edit($num_ordre)
    {
        $materiel = Materiel::where('Num_ordre', $num_ordre)->firstOrFail();
        return view('Materiels.edit', compact('materiel'));
    }
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

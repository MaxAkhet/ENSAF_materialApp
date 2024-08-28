<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepenseController extends Controller
{
    //Ajout d'une depense
    public function create()
    {
        $materiels = Materiel::all(); // Récupère tous les matériels
        return view('Depenses.ajouter', compact('materiels'));
    }
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'materiel_id' => 'required|exists:materiels,Num_ordre',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        // Création de la dépense
        Depense::create($request->all());

        return redirect()->route('depenses.ajouter')->with('success', 'Dépense ajoutée avec succès.');
    }



    public function getDepensesParAnnee()
    {
        $depensesParAnnee = Depense::select(
            DB::raw('YEAR(date) as annee'),
            DB::raw('SUM(amount) as total_depenses')
        )
        ->groupBy('annee')
        ->orderBy('annee', 'desc')
        ->get();

        return view('Depenses.annees', compact('depensesParAnnee'));
    }

    // Méthode pour obtenir les dépenses par année et par catégorie
    public function getDepensesParAnneeEtCategorie()
    {
        $depensesParAnneeEtCategorie = Depense::join('materiels', 'depenses.materiel_id', '=', 'materiels.Num_ordre')
            ->select(
                DB::raw('YEAR(depenses.date) as annee'),
                'materiels.Categorie as categorie',
                DB::raw('SUM(depenses.amount) as total_depenses')
            )
            ->groupBy('annee', 'categorie')
            ->orderBy('annee', 'desc')
            ->orderBy('categorie')
            ->get();

        return view('Depenses.annees_categories', compact('depensesParAnneeEtCategorie'));
    }
}

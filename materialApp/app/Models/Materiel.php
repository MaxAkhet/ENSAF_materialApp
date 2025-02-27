<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;

    protected $primaryKey = 'Num_ordre';


    protected $fillable = [
        'departement',
        'categorie',
        'designation',
        'fournisseur',
        'prix_ht',
        'date_acquisition',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    use HasFactory;
    protected $fillable = [
        'materiel_id',
        'description',
        'amount',
        'date',
    ];

    // Définir la relation avec le modèle Materiel
    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'materiel_id', 'Num_ordre');
    }
}

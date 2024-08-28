<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->increments('Num_ordre'); // Clé primaire auto-incrémentée
            $table->string('Departement');
            $table->string('Categorie');
            $table->string('Designation');
            $table->string('Fournisseur');
            $table->decimal('Prix_HT', 8, 2); // Champ pour le prix HT avec 8 chiffres au total, dont 2 après la virgule
            $table->date('Date_Acquisition'); // Date d'acquisition
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiels');
    }
};

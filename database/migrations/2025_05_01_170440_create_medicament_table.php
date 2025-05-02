<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id('num_med'); // Numéro de médicament comme clé primaire
            $table->string('nom_med'); // Nom du médicament
            $table->string('therapeutique'); // Thérapeutique du médicament
            $table->string('unite'); // Unité de dosage (par exemple : mg, ml, etc.)
            $table->string('forme_galenique'); // Forme galénique du médicament (comprimé, solution, etc.)
            $table->timestamps(); // Champs created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicaments');
    }
}

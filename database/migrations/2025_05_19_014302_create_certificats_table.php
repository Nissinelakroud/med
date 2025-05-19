<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    { 
        
        Schema::create('certificats', function (Blueprint $table) {
            $table->bigIncrements('num_certif');
            
            $table->text('contenu'); 
            
            $table->timestamps();
            $table->unsignedBigInteger('id_visite');
            $table->foreign('id_visite')->references('id_visite')->on('visites')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificats');
    }
}

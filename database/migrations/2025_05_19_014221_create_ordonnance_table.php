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
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->id('num_ord'); 
            $table->text('description'); 

            $table->unsignedBigInteger('id_visite'); 
            $table->foreign('id_visite')->references('id_visite')->on('visites')->onDelete('cascade');

            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordonnances');
    }
};

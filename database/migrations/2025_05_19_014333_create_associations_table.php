<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssociationsTable extends Migration
{
    public function up()
    { 
        Schema::disableForeignKeyConstraints();
        Schema::create('associations', function (Blueprint $table) {
            $table->bigIncrements('id_association'); // Clé primaire pour l'association
            
            $table->timestamps(); // Gestion des timestamps (created_at, updated_at)

            $table->unsignedBigInteger('id_visite');
            $table->foreign('id_visite')->references('id_visite')->on('visites')->onDelete('cascade');
           
            $table->unsignedBigInteger('id_cmpt');
            $table->foreign('id_cmpt')->references('id_cmpt')->on('compte_rendus')->onDelete('cascade');
           
            $table->unique(['id_visite', 'id_cmpt']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('association');
    }
}

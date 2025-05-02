<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    { 
      
        Schema::create('patients', function (Blueprint $table) {
           
            $table->bigIncrements('id_patient');
            $table->string('nom_patient');
            $table->string('prenom_patient');
            $table->string('CIN')->unique();
            $table->string('email')->nullable();
            $table->date('date_naissance');
            $table->string('telephone')->nullable();
            $table->string('assurance')->nullable();
            $table->string('adresse')->nullable();
            $table->float('poids')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}

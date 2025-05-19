<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { 
    public function up(): void
    { 
        Schema::create('rdv', function (Blueprint $table) {
            
            $table->bigIncrements('num_rdv'); 
           
            $table->date('date_rdv');
            $table->string('motif');
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id_patient')->on('patients')->onDelete('cascade');
        });
    }

    public function down(): void
{
   
        Schema::dropIfExists('rdv');
    
} 

} ;

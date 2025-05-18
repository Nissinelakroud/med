<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::disableForeignKeyConstraints();
        Schema::create('consultations', function (Blueprint $table) {
            $table->bigIncrements('id_consultation');
            $table->string('motif');
            $table->timestamps();
            $table->decimal('temperature', 5, 2); 
            $table->text('symptomes'); 
            $table->integer('tension_arterielle_systolique'); 
            $table->integer('tension_arterielle_diastolique'); 
            $table->decimal('saturation_oxygene', 5, 2); 
            $table->integer('frequence_cardiaque'); 
            $table->decimal('poids', 5, 2); 
            $table->decimal('taille', 5, 2); 
            $table->text('diagnostic_principal'); 
            $table->text('traitement'); 
            $table->unsignedBigInteger('id_visite');
            $table->foreign('id_visite')->references('id_visite')->on('visites')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}


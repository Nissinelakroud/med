<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
       
        Schema::create('utilisateurs', function (Blueprint $table) { 
           
            $table->bigIncrements('id_utilisateur');
            $table->string('nom'); 
            $table->string('email')->unique(); 
            $table->string('mot_de_passe');  
            
            $table->unsignedBigInteger('id_role')->nullable();
            $table->foreign('id_role')->references('id_role')->on('roles')->onDelete('cascade');

            
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}

<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContientsTable extends Migration
{
    public function up()
    { 
        Schema::disableForeignKeyConstraints();
        Schema::create('contients', function (Blueprint $table) {
           
            $table->string('posologie');
            $table->timestamps();
            $table->unsignedBigInteger('num_ord');
            $table->foreign('num_ord')->references('num_ord')->on('ordonnance')->onDelete('cascade');
           
           
            $table->unsignedBigInteger('num_med');
            $table->foreign('num_med')->references('num_med')->on('medicaments')->onDelete('cascade');
           
           
            $table->primary(['num_ord', 'num_med']); 

        });
    }

    public function down()
    {
        Schema::dropIfExists('contients');
    }
}

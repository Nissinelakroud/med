<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compte_rendus', function (Blueprint $table) {
            $table->id('id_cmpt'); 
            $table->text('text');  
            $table->timestamps();  
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compte_rendus');
    }
};

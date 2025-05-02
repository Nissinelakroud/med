<?php
// database/migrations/2025_04_30_123456_create_roles_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::disableForeignKeyConstraints(); 
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_role'); 
            $table->string('role'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

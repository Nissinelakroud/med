<?php 
// app/Models/Role.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_role';
    protected $fillable = ['role'];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
?>
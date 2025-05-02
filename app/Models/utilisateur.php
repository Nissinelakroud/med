<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_utilisateur';
    protected $fillable = ['nom', 'email', 'mot_de_passe', 'role_id'];

    protected $hidden = ['mot_de_passe']; 

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}

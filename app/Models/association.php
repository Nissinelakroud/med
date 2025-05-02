<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    protected $table = 'association'; // Spécifie le nom de la table

    protected $primaryKey = 'id'; // La clé primaire de cette table (id auto-incrémenté)

    protected $fillable = [
        'id_visite', 
        'id_cmpt',
    ];

   
    public function visite()
    {
        return $this->belongsTo(Visite::class, 'id_visite');
    }

  
    public function compteRendu()
    {
        return $this->belongsTo(Compte_Rendu::class, 'id_cmpt');
    }
}

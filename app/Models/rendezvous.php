<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    protected $primaryKey = 'num_rdv'; // si tu utilises num_rdv comme clé primaire
    
    protected $table = 'rdv';
    protected $fillable = [
        
        'date_rdv',
        'motif',
        'id_patient',
    ];

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }
}

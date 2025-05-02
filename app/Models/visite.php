<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    protected $primaryKey = 'id_visite'; // si tu utilises id_visite comme PK

    protected $fillable = [
        'id_visite',
        'date_visite',
        'id_patient',
        'id_utilisateur',
        'num_rdv',
    ];

    public $timestamps = false; // à activer si tu n’as pas de colonnes created_at / updated_at

    // Relations
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function rendezvous()
    {
        return $this->belongsTo(Rendezvous::class, 'num_rdv');
    }
}

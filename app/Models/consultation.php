<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_consultation'; 

    protected $fillable = [
        'motif',
        'temperature',
        'symptomes',
        'tension_arterielle_systolique',
        'tension_arterielle_diastolique',
        'saturation_oxygene',
        'frequence_cardiaque',
        'poids',
        'taille',
        'diagnostic_principal',
        'traitement',  
        'id_patient',
        'id_visite'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id_patient');
    }

    public function visite()
    {
        return $this->belongsTo(Visite::class, 'id_visite');
    }
}

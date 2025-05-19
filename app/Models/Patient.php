<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_patient';
    protected $table = 'patients';

    protected $fillable = [
        'nom_patient',
        'prenom_patient',
        'CIN', 
        'email', 
        'date_naissance', 
        'telephone', 
        'assurance',
        'adresse',
        'poids'
    ];

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'id_patient', 'id_patient');
    }
}

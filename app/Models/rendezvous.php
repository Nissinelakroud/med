<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Rendezvous extends Model
{
    protected $primaryKey = 'num_rdv'; // primary key is num_rdv
    protected $table = 'rdv';
    protected $fillable = [
        'date_rdv',
        'motif',
        'id_patient',
    ];

    public $timestamps = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient', 'id_patient');
    }
}

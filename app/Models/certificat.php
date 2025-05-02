<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;
    protected $primaryKey = 'num_certif';
    protected $fillable = [
       
        'contenu',
        'id_visite',
    ];

    
    public function visite()
    {
        return $this->belongsTo(Visite::class, 'id_visite');
    }
}

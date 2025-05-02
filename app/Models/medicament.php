<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $primaryKey = 'num_med';
    protected $fillable = [
        
        'nom_med',
        'therapeutique',
        'unite',
        'forme_galenique'
    ];
}

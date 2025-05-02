<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordonnance extends Model
{
    protected $primaryKey = 'num_ord';

public function visite()
{
    return $this->belongsTo(Visite::class, 'id_visite');
}  }
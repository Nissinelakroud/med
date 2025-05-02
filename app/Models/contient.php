<?php
 namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Contient extends Pivot
{
    protected $table = 'contient';
    protected $fillable = ['num_ord', 'num_med', 'posologie'];

    public function ordonnance()
    {
        return $this->belongsTo(Ordonnance::class, 'num_ord');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'num_med');
    }
}

<?php




namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class compte_Rendu extends Model
{
    protected $primaryKey = 'id_cmpt'; 
    protected $table = 'compte_rendus'; 
    protected $fillable = [
        'text', 
    ];

  
}

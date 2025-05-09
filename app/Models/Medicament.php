<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $table = 'medicaments';
    protected $fillable = ['usuari_id', 'nom', 'descripcio', 'dosi', 'inici', 'fi'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuari_id');
    }
}

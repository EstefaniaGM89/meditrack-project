<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;

    protected $table = 'medicaments';

    protected $fillable = [
        'pacient_id',
        'nom',
        'descripcio',
        'dosi',
        'inici',
        'fi'
    ];

    public function pacient()
    {
        return $this->belongsTo(Pacient::class, 'pacient_id');
    }
}

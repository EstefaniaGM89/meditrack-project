<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pacient extends Model
{
    use HasFactory;

    protected $table = 'pacients';

    protected $fillable = [
        'nom',
        'email',
        'data_naixement',
        'pass' // si aún lo usas
    ];

    public function recordatoris()
    {
        return $this->hasMany(Recordatori::class, 'pacient_id');
    }

    public function medicaments()
    {
        return $this->hasMany(Medicament::class);
    }
}

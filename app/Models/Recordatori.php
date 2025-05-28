<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatori extends Model
{
    use HasFactory;

    protected $fillable = [
        'pacient_id',
        'medicament_id',
        'missatge',
        'inici',
        'fi',
        'data_hora',
        'dies_setmana',
        'estat',
    ];

    protected $casts = [
        'dies_setmana' => 'array',

    ];

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class);
    }
}

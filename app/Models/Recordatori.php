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
        'hora',
        'dies_setmana',
        'estat',
    ];

    protected $casts = [
        'dies_setmana' => 'array',
        'data_hora' => 'datetime',
        'hora' => 'datetime:H:i',
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

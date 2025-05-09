<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recordatori extends Model
{
    use HasFactory;

    protected $fillable = [
        'pacient_id',
        'medicaments_id',
        'personal_sanitari_id',
        'missatge',
        'data_hora',
        'hora',
        'dies_setmana',
        'estat',
        'observacions',
    ];

    protected $casts = [
        'dies_setmana' => 'array',
    ];

    public function pacient()
    {
        return $this->belongsTo(Pacient::class);
    }

    public function personalSanitari()
    {
        return $this->belongsTo(PersonalSanitari::class);
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicaments_id');
    }
}

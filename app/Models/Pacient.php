<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pacient extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'email',
        'pass',
        'data_naixement',
        'num_document', // <- asegúrate de tenerlo aquí
        'telefon',
        'adreca',
        'ciutat',
        'codi_postal',
        'provincia',
        'pais',
        'observacions',
        'alergies',
        'medicaments',
        'antecedents',
        'vacunes',
        'metode_contacte',
    ];

    protected $hidden = ['pass'];

    public function recordatoris()
    {
        return $this->hasMany(Recordatori::class);
    }

    public function medicaments()
    {
        return $this->belongsToMany(Medicament::class, 'recordatoris');
    }

    public function dadesSalut()
    {
        return $this->hasMany(DadesSalut::class);
    }
}

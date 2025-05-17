<!-- Model per els pacients -->
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
        'telefon',
        'adreca',
        'ciutat',
        'codi_postal',
        'provincia',
        'pais',
        'num_document',
        'metode_contacte',
        'observacions',
        'alergies',
        'medicaments',
        'antecedents',
        'vacunes',
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

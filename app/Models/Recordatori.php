<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatori extends Model
{
    use HasFactory;

    protected $table = 'recordatoris';
    protected $fillable = ['usuaris_id', 'medicaments_id', 'missatge', 'data_hora', 'estat'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuaris_id');
    }

    public function medicament()
    {
        return $this->belongsTo(Medicament::class, 'medicaments_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadesSalut extends Model
{
    use HasFactory;

    protected $table = 'dades_salut';
    protected $fillable = ['usuari_id', 'tipus_dada', 'valor', 'unitats', 'data_registre'];

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuari_id');
    }
}
